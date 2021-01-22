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
    var MediaUpload = wp.editor.MediaUpload;
    var ButtonGroup = wp.components.ButtonGroup;
    var Button = wp.components.Button;
    var ToggleControl = wp.components.ToggleControl;
    var RangeControl = wp.components.RangeControl;

    registerBlockType( 'dvaux/section', { // The name of our block. Must be a string with prefix. Example: my-plugin/my-custom-block.
        title: i18n.__( 'セクション' ), // The title of our block.
        icon: 'welcome-write-blog', // Dashicon icon for our block. Custom icons can be added using inline SVGs.
        category: 'auxiliary', // The category of the block.
        attributes: { // Necessary for saving block content.
            icon: {
                type: 'string',
            },
            sectionType: {
                type: 'string',
                default:'simple'
            },
            sectionStyle:{
                type: 'string',
                default:'normal'
            },
            sectionBGColor: {
                type: 'string',
                default:'#ccc'
            },
            sectionBGimage:{
                type: 'string',
            },
            sectionBGimageURL: {
                type: 'string',
            },
            bgImagePosition:{
                type: 'string',
                default:'center'
            },
            bgImageRepeat:{
                type: 'boolean',
                default: false,
            },
            bgImageFilter:{
                type:'Number',
                default:30,
            },
            sectionfilterColor:{
                type:'string',
                default:'#000'
            }
        },

        edit: function( props ) {

            var attributes = props.attributes;
            var sectionType = props.attributes.sectionType;
            var sectionStyle = props.attributes.sectionStyle;
            var sectionBGColor = props.attributes.sectionBGColor;
            var sectionBGimage = props.attributes.sectionBGimage;
            var sectionBGimageURL = props.attributes.sectionBGimageURL;
            var bgImagePosition = props.attributes.bgImagePosition;
            var bgImageRepeat = props.attributes.bgImageRepeat;
            var bgImageFilter = props.attributes.bgImageFilter;
            var sectionfilterColor = props.attributes.sectionfilterColor;

            var settingEl = '';
            var sectionCSS = '';
            var sectionFilter = '';

            if(sectionType == 'bgimage'){
                settingEl = el(BaseControl,{label: i18n.__( '画像' )},
                el('figure',{className:'section_bg_preview'},
                        el('img',{src:sectionBGimageURL}),
                    ),
                el(MediaUpload,{
                    type: 'image',
                    value: sectionBGimage,
                    onSelect: function( media ) {
                        return props.setAttributes( {
                            sectionBGimageURL: media.url,
                            sectionBGimage: media.id,
                        } );
                    },
                    render: function( obj ) {
                        return el( Button, {
                            className: 'components-button icon-button is-button is-default is-large',
                            onClick: obj.open
                        },
                        i18n.__( '画像選択' )
                        );
                    }
                }),
                el(SelectControl,{
                    label:'ポジション',
                    value: bgImagePosition,
                    className:'radio-button',
                    onChange: function( newbgImagePosition ) {
                        props.setAttributes( { bgImagePosition: newbgImagePosition } );

                    },
                    options: [
                    {value:"right",label:"右"},
                    {value:"left",label:"左"},
                    {value:"top",label:"上"},
                    {value:"bottom",label:"下"},
                    {value:"center",label:"中"}
                    ],
                }),
                el(ToggleControl,{
                    label: i18n.__( '繰り返し' ),
                    checked: bgImageRepeat,
                    onChange: function( newbgImageRepeat) {
                        props.setAttributes( { bgImageRepeat: newbgImageRepeat } );
                    },
                }),
                el(RangeControl,{
                    label:'フィルター濃さ',
                    value: bgImageFilter,
                    min:[10],
                    max:[99],
                    onChange: function( newbgImageFilter ) {
                        props.setAttributes( { bgImageFilter: newbgImageFilter } );
                    }
                }),
                el(BaseControl,{label: i18n.__( 'フィルター色' )},
                    el(ColorPalette, {
                            value: sectionfilterColor,
                            onChange: function(newsectionfilterColor){
                                props.setAttributes( { sectionfilterColor: newsectionfilterColor } );
                            }
                        }
                    )
                ),              
            );

            sectionCSS = {backgroundColor:attributes.sectionBGColor,backgroundImage:'url('+sectionBGimageURL+')',backgroundRepeat:bgImageRepeat ? 'repeat':'no-repeat',backgroundPosition:bgImagePosition};
            props.setAttributes( { sectionStyle: 'normal' } );

            sectionFilter = el('div',{className:'section_filter',style:{opacity:"0."+bgImageFilter,backgroundColor:sectionfilterColor}});


            }else{
                settingEl = el(SelectControl,{
                    value: sectionStyle,
                    onChange: function( newsectionStyle ) {
                        props.setAttributes( { sectionStyle: newsectionStyle } );

                    },
                    options: [{
                        value:"normal",
                        label:"スタイルなし"
                    },
                    {
                        value:"balloon",
                        label:"吹き出し"
                    },
                    {
                        value:"slope1",
                        label:"斜め１"
                    },
                    {
                        value:"slope2",
                        label:"斜め２"
                    },
                    {
                        value:"radius",
                        label:"丸み"
                    }
                    ],
                });

                sectionCSS = {backgroundColor:attributes.sectionBGColor};
                sectionFilter = "";
            }


            return [
                el(Fragment,null,
                    el( InspectorControls, { key: 'inspector' }, // Display the block options in the inspector panel.
                        el( components.PanelBody, {title: i18n.__( 'セクション設定' ),className:'voice-settings',initialOpen: true},
                            el(BaseControl,{label: i18n.__( 'タイプ' ),className:'setting-flex'},
                                el(RadioControl,{
                                    type: 'radio',
                                    selected: sectionType,
                                    className:'radio-button',
                                    onChange: function( newsectionType ) {
                                        props.setAttributes( { sectionType: newsectionType } );

                                    },
                                    options: [{
                                        value:"simple",
                                        label:"シンプル"
                                    },
                                    {
                                        value:"bgimage",
                                        label:"背景画像"
                                    }
                                    ],
                                }),
                            ),
                            settingEl,
                        ),
                        el(components.PanelBody,{title: i18n.__( 'カラー設定' ),className: 'button-color-settings',initialOpen: true}, 
                            el(BaseControl,{label: i18n.__( '背景色' )},
                                el(ColorPalette, {
                                        value: sectionBGColor,
                                        onChange: function(newsectionBGColor){
                                            props.setAttributes( { sectionBGColor: newsectionBGColor } );
                                        }
                                    }
                                )
                            ),               
                        )
                    ),
                    el( 'div', {className: 'dvaux_section_environ '+sectionStyle},
                        el('div',{
                                className:'dvaux_section_inner',
                                style:sectionCSS
                            },
                            sectionFilter,
                            el( InnerBlocks,null),
                        )
                    )
                )
            ];
        },

        save: function( props ) {
            var attributes = props.attributes;
            var sectionType = props.attributes.sectionType;
            var sectionStyle = props.attributes.sectionStyle;
            var sectionBGColor = props.attributes.sectionBGColor;
            var sectionBGimage = props.attributes.sectionBGimage;
            var sectionBGimageURL = props.attributes.sectionBGimageURL;
            var bgImagePosition = props.attributes.bgImagePosition;
            var bgImageRepeat = props.attributes.bgImageRepeat;
            var bgImageFilter = props.attributes.bgImageFilter;
            var sectionfilterColor = props.attributes.sectionfilterColor;

            var sectionCSS = '';
            var sectionFilter = '';

            if(sectionType == 'bgimage'){
                sectionCSS = {backgroundColor:sectionBGColor,backgroundImage:'url('+sectionBGimageURL+')',backgroundRepeat:bgImageRepeat ? 'repeat':'no-repeat',backgroundPosition:bgImagePosition};
                sectionFilter = el('div',{className:'section_filter',style:{opacity:"0."+bgImageFilter,backgroundColor:sectionfilterColor}});
            }else{
                sectionCSS = {backgroundColor:sectionBGColor};
            }

            return (
                el( 'div', {className: 'dvaux_section_environ '+sectionStyle},
                    el( 'div', { 
                            className: 'dvaux_section_inner',
                            style:sectionCSS
                        },
                        sectionFilter,
                        el(InnerBlocks.Content,null),
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