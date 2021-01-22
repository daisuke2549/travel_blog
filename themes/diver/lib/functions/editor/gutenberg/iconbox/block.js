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


    registerBlockType( 'dvaux/iconbox', { // The name of our block. Must be a string with prefix. Example: my-plugin/my-custom-block.
        title: i18n.__( 'アイコンボックス' ), // The title of our block.
        icon: 'nametag', // Dashicon icon for our block. Custom icons can be added using inline SVGs.
        category: 'auxiliary', // The category of the block.
        attributes: { // Necessary for saving block content.
            icon: {
                type: 'string',
            },
            title: {
                type: 'string',
            },
            textcontent: {
                type: 'string',
            },
            columnType:{
                type: 'string',
                default:'iconbox'
            },
            iconboxTEXTcolor:{
                type: 'string',
                default:'#000'
            },
            iconboxBGcolor:{
                type: 'string',
                default:'#fff'
            },
            iconboxTitletag:{
                type: 'string',
                default:'div'
            }        
        },

        edit: function( props ) {

            var attributes = props.attributes;
            var columnType = props.attributes.columnType;
            var columnTemplate = (columnType == 'iconbox') ? 'dvaux/icon' : 'core/image' ;
            var iconboxBGcolor = props.attributes.iconboxBGcolor;
            var iconboxTEXTcolor = props.attributes.iconboxTEXTcolor;
            var iconboxTitletag = (props.attributes.iconboxTitletag) ? props.attributes.iconboxTitletag : 'div' ;

            return [
                el(Fragment,null,
                    el( InspectorControls, { key: 'inspector' }, // Display the block options in the inspector panel.
                        el( components.PanelBody, {title: i18n.__( 'レイアウト設定' ),className: 'voice-settings',initialOpen: true},
                            el(BaseControl,{label: i18n.__( 'タイプ' ),className:'setting-flex'},
                                el(RadioControl,{
                                    type:'radio',
                                    className:'radio-button',
                                    selected: columnType,
                                    onChange: function( newcolumnType ) {
                                        props.setAttributes( { columnType: newcolumnType } );

                                    },
                                    options: [{
                                        value:"imagebox",
                                        label:"画像"
                                    },
                                    {
                                        value:"iconbox",
                                        label:"アイコン"
                                    }
                                    ],
                                })
                            ),
                            el(BaseControl,{className:'setting-flex'},
                                el(RadioControl,{
                                    type: 'radio',
                                    className:'radio-button',
                                    selected: iconboxTitletag,
                                    onChange: function( newiconboxTitletag ) {
                                        props.setAttributes( { iconboxTitletag: newiconboxTitletag } );

                                    },
                                    options: [{
                                        value:"div",
                                        label:"div"
                                    },
                                    {
                                        value:"h2",
                                        label:"H2"
                                    },
                                    {
                                        value:"h3",
                                        label:"H3"
                                    },
                                    {
                                        value:"h4",
                                        label:"H4"
                                    },
                                    {
                                        value:"h5",
                                        label:"H5"
                                    }],
                                })
                            ),
                        ),                     
                        el(components.PanelBody,{title: i18n.__( 'カラー設定' ),className: 'color-settings',initialOpen: true}, 
                            el(BaseControl,{label: i18n.__( '文字色' )},
                                el(ColorPalette, {
                                        value: attributes.iconboxTEXTcolor,
                                        onChange: function(newiconboxTEXTcolor){
                                            props.setAttributes( { iconboxTEXTcolor: newiconboxTEXTcolor } );
                                        }
                                    }
                                )
                            ),                             
                            el(BaseControl,{label: i18n.__( '背景色' )},
                                el(ColorPalette, {
                                        value: attributes.iconboxBGcolor,
                                        onChange: function(newiconboxBGcolor){
                                            props.setAttributes( { iconboxBGcolor: newiconboxBGcolor } );
                                        }
                                    }
                                )
                            ),               
                        )
                    ),
                    el('div',{className:'dvaux_iconbox',style:{backgroundColor:iconboxBGcolor}},
                        el( InnerBlocks,{
                            templateLock: 'all',
                            className:'dvaux_iconbox--icon',
                            template:[[columnTemplate]],
                            allowedBlocks:[columnTemplate],
                        }),
                        el('div',{className:'dvaux_iconbox_meta',style:{color:iconboxTEXTcolor}},
                            el( RichText, {
                                placeholder: 'タイトルを追加...',
                                className: 'title',
                                tagName: iconboxTitletag,
                                value: attributes.title,
                                onChange: function( newTitle ) {
                                    props.setAttributes( { title: newTitle } );
                                },
                            }),
                            el( RichText, {
                                placeholder: '文章を追加...',
                                value: attributes.textcontent,
                                tagName: 'div',
                                className: 'textcontent',
                                onChange: function( newTextcontent ) {
                                    props.setAttributes( { textcontent : newTextcontent } );
                                },
                            }),
                        )
                    )
                )
            ];
        },

        save: function( props ) {
            var attributes = props.attributes;
            var columnType = props.attributes.columnType;
            var iconboxBGcolor = props.attributes.iconboxBGcolor;
            var iconboxTEXTcolor = props.attributes.iconboxTEXTcolor;
            var iconboxTitletag = (props.attributes.iconboxTitletag) ? props.attributes.iconboxTitletag : 'div' ;

            return (
                el( 'div', { className: 'dvaux_iconbox',style:{backgroundColor:iconboxBGcolor}},
                    el(InnerBlocks.Content,{className:'dvaux_iconbox--icon'}),
                    el('div',{className:'dvaux_iconbox_meta',style:{color:iconboxTEXTcolor}},
                        el( RichText.Content, {
                            tagName: iconboxTitletag,
                            className: 'title',
                            value: attributes.title
                        } ),
                        el( RichText.Content, {
                            tagName: 'div',
                            className: 'textcontent',
                            value: attributes.textcontent
                        }),
                    )
                )
            );
        },
    } );

} )(
    window.wp.editor,
    window.wp.components,
    window.wp.i18n,
    window.wp.element,
);