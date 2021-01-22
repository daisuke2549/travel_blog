( function( editor, components, i18n, element ) {
    var el = element.createElement;
    var registerBlockType = wp.blocks.registerBlockType;
    var BlockControls = wp.editor.BlockControls;
    var InspectorControls = wp.editor.InspectorControls;
    var RadioControl = wp.components.RadioControl;
    var BaseControl = wp.components.BaseControl;
    var InnerBlocks = wp.editor.InnerBlocks;
    var Fragment = wp.element.Fragment;
    var RichText = wp.editor.RichText;
    var ColorPalette = wp.editor.ColorPalette;
    var SelectControl = wp.components.SelectControl;
    var ToggleControl = wp.components.ToggleControl;
    var RangeControl = wp.components.RangeControl;
    var ServerSideRender = wp.components.ServerSideRender;
    var TextControl = wp.components.TextControl;

    registerBlockType( 'dvaux/article-posts', { // The name of our block. Must be a string with prefix. Example: my-plugin/my-custom-block.
        title: i18n.__( '記事一覧' ), // The title of our block.
        icon: 'list-view', // Dashicon icon for our block. Custom icons can be added using inline SVGs.
        category: 'auxiliary', // The category of the block.

        attributes: { // Necessary for saving block content.
            number: {
                type: 'number',
                default: 9
            },
            posttype:{
                type:'string',
                default: 'category'
            },
            category:{
                type: 'string',
                default: 'none',
            },
            rank_period:{
                type:'string',
                default:'all'
            },
            layout: {
                type: 'string',
                default: 'grid',
            },
            orderby: {
                type: 'string',
                default: 'post_date',
            },               
            order: {
                type: 'string',
                default: 'DESC',
            },            
            date_on: {
                type: 'boolean',
                default: true,
            },
            cat_on: {
                type: 'boolean',
                default: true,
            },      
        },
        edit: function( props ) {

            var attributes = props.attributes;
            var number = props.attributes.number;
            var posttype = props.attributes.posttype;
            var rank_period = props.attributes.rank_period;
            var date_on = props.attributes.date_on;
            var cat_on = props.attributes.cat_on;
            var layout = props.attributes.layout;
            var orderby = props.attributes.orderby;
            var order = props.attributes.order;
            var category = props.attributes.category;

            var category_Arr = [{ value:'none', label: '未設定'}];

            for (  var i = 0;  i < category_all.length; i++  ) {
                category_Arr.push({ value: category_all[i].cat_ID, label: category_all[i].cat_name});
             }

             var settings = "";

             if(posttype == "rank"){
                    settings = el(SelectControl,{
                            label:'ランキング期間',
                            value: rank_period,
                            onChange: function( newrank_period ) {
                                props.setAttributes( { rank_period: newrank_period } );

                            },
                            options: [
                                {value:"all",label:"全期間"},
                                {value:"month",label:"先週"},
                                {value:"week",label:"先週"},
                                {value:"day",label:"昨日"},
                            ],
                        });
                }else{
                    settings = el(BaseControl,null,
                        el(SelectControl,{
                            label:'表示カテゴリー',
                            value: category,
                            onChange: function( newCategory ) {
                                props.setAttributes( { category: newCategory } );

                            },
                            options: category_Arr,
                        }),
                        el(SelectControl,{
                            label:'並び替え条件',
                            value: orderby,
                            onChange: function( newOrderby ) {
                                props.setAttributes( { orderby: newOrderby } );

                            },
                            options: [
                                {value:"post_date",label:"公開日"},
                                {value:"modified",label:"更新日"},
                                {value:"title",label:"タイトル"},
                                {value:"rand",label:"ランダム"},
                            ],
                        }),
                        el(BaseControl,{label: i18n.__( '並び順' ),className:'setting-flex'},
                            el(RadioControl,{
                                type: 'radio',
                                className:'radio-button',
                                selected: order,
                                onChange: function( newOrder ) {
                                    props.setAttributes( { order: newOrder } );

                                },
                                options: [{
                                    value:"ASC",
                                    label:"昇順"
                                },
                                {
                                    value:"DESC",
                                    label:"降順"
                                }],
                            })
                        ));
                }


            return [
                el(Fragment,null,
                    el( InspectorControls, { key: 'inspector' }, // Display the block options in the inspector panel.
                        el( components.PanelBody, {title: i18n.__( '記事一覧設定' ),className:'voice-settings',initialOpen: true},
                            el(RangeControl,{
                                label:'記事数',
                                value: number,
                                min:[1],
                                max:[30],
                                onChange: function( newNumber ) {
                                    props.setAttributes( { number: newNumber } );
                                }
                            }),
                            el(BaseControl,{label: i18n.__( 'タイプ' ),className:'setting-flex'},
                                el(RadioControl,{
                                    type: 'radio',
                                    className:'radio-button',
                                    selected: posttype,
                                    onChange: function( newType ) {
                                        props.setAttributes( { posttype: newType } );

                                    },
                                    options: [{
                                        value:"category",
                                        label:"カテゴリー"
                                    },
                                    {
                                        value:"rank",
                                        label:"ランキング"
                                    }],
                                })
                            ),  
                            el(SelectControl,{
                                label:'レイアウト',
                                value: layout,
                                onChange: function( newLayout ) {
                                    props.setAttributes( { layout: newLayout } );

                                },
                                options: [
                                    {value:"grid",label:"グリッド"},
                                    {value:"list",label:"リスト"},
                                    {value:"simple",label:"シンプル"},
                                ],
                            }),
                            settings,                        
                            el(ToggleControl,{
                                label: i18n.__( '日付表示' ),
                                checked: date_on,
                                onChange: function( newDate_on) {
                                    props.setAttributes( { date_on: newDate_on } );
                                },
                            }),
                            el(ToggleControl,{
                                label: i18n.__( 'カテゴリー表示' ),
                                checked: cat_on,
                                onChange: function( newCat_on) {
                                    props.setAttributes( { cat_on: newCat_on } );
                                },
                            }),
                        ),
                    ),
                    el(ServerSideRender,{
                        block:"dvaux/article-posts",
                        attributes:attributes,
                    })
                )
            ];
        },

        save: function( props ) {
            return null;
        },
    } );

} )(
    window.wp.editor,
    window.wp.components,
    window.wp.i18n,
    window.wp.element,
);