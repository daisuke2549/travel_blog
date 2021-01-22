( function( editor, components, i18n, element ) {
    var el = element.createElement;
    var registerBlockType = wp.blocks.registerBlockType;
    var RichText = wp.editor.RichText;
    var BlockControls = wp.editor.BlockControls;
    var InspectorControls = wp.editor.InspectorControls;
    var TextControl = wp.components.TextControl;
    var RadioControl = wp.components.RadioControl;
    var ToggleControl = wp.components.ToggleControl;
    var PanelColor = wp.components.PanelColor;
    var ColorPalette = wp.editor.ColorPalette;
    var BaseControl = wp.components.BaseControl;

    registerBlockType( 'dvaux/button', { // The name of our block. Must be a string with prefix. Example: my-plugin/my-custom-block.
        title: i18n.__( 'ボタン' ), // The title of our block.
        description: i18n.__( '様々なデザインのボタンが作成出来ます。リンク先URLの設定を忘れないようにしましょう。' ), // The description of our block.
        icon: 'button', // Dashicon icon for our block. Custom icons can be added using inline SVGs.
        category: 'auxiliary', // The category of the block.
        attributes: { // Necessary for saving block content.
            title: {
                type: 'text',
            },
            btnURL: {
                type: 'url',
            },
            btnSize:{
                type: 'string',
                default:'medium'
            },
            btntype: {
                type: 'string',
                default:'button simple block'
            },
            btnTarget: {
                type: 'boolean',
                default: false,
            },
            btnFollow: {
                type: 'boolean',
                default: false,
            },
            btnBGColor: {
                type: 'string',
                default:'#70b8f1'
            },
            btnTXTColor: {
                type: 'string',
                default:'#fff'
            },
            btnBorderColor:{
                type: 'string',
                default:'#ccc'
            }
        },

        edit: function( props ) {

            var attributes = props.attributes;
            var btnURL = props.attributes.btnURL;
            var btntype = props.attributes.btntype;
            var btnBGColor = props.attributes.btnBGColor;
            var btnTXTColor = props.attributes.btnTXTColor;
            var btnBorderColor = props.attributes.btnBorderColor;
            var btnSize = props.attributes.btnSize;
            var btnFollow = props.attributes.btnFollow;
            var btnTarget = props.attributes.btnTarget;

            return [
                el( InspectorControls, { key: 'inspector' }, // Display the block options in the inspector panel.
                    el( components.PanelBody, {title: i18n.__( 'ボタン詳細設定' ),className: 'button-settings',initialOpen: true},
                        el( TextControl, {
                            type: 'url',
                            label: i18n.__( 'リンク先URL' ),
                            value: btnURL,
                            onChange: function( newbtnURL ) {
                                props.setAttributes( { btnURL: newbtnURL } );
                            },
                        }),
                        el(ToggleControl,{
                            label: i18n.__( '別タブで開く' ),
                            checked: btnTarget,
                            onChange: function( newbtnTagert) {
                                props.setAttributes( { btnTarget: newbtnTagert } );
                            },
                        }),
                        el(ToggleControl,{
                            label: i18n.__( 'nofollow' ),
                            checked: btnFollow,
                            onChange: function( newbtnFollow) {
                                props.setAttributes( { btnFollow: newbtnFollow } );
                            },
                        }),
                        el(BaseControl,{label: i18n.__( 'サイズ' ),className:'setting-flex'},
                            el(RadioControl,{
                                type: 'radio',
                                className:'radio-button',
                                selected: btnSize,
                                onChange: function( newbtnSize ) {
                                    props.setAttributes( { btnSize: newbtnSize } );

                                },
                                options: [{
                                    value:"small",
                                    label:"小"
                                },
                                {
                                    value:"medium",
                                    label:"中"
                                },
                                {
                                    value:"big",
                                    label:"大"
                                }
                                ],
                            })
                        ),                    
                    ),
                    el( components.PanelBody, {title: i18n.__( 'ボタンデザイン設定' ),className: 'button-design',initialOpen: true},
                        el(RadioControl,{
                            type: 'radio',
                            selected: btntype,
                            onChange: function( newbtntype ) {
                                props.setAttributes( { btntype: newbtntype } );

                            },                            
                            options: [
                            { value: 'button simple block', label: 
                                el( 'div', {className: 'button simple block'},
                                    el( 'span', {className: 'dvaux-button_link'},
                                        'ボタン',
                                    ),
                                )
                            },
                            { value: 'button bborder block', label: 
                                el( 'div', {className: 'button bborder block'},
                                    el( 'span', {className: 'dvaux-button_link'},
                                        'ボタン',
                                    ),
                                )
                            },
                            { value: 'button shadow block', label: 
                                el( 'div', {className: 'button shadow block'},
                                    el( 'span', {className: 'dvaux-button_link'},
                                        'ボタン',
                                    ),
                                )
                            },
                            { value: 'button shadow bborder block', label: 
                                el( 'div', {className: 'button shadow bborder block'},
                                    el( 'span', {className: 'dvaux-button_link'},
                                        'ボタン',
                                    ),
                                )
                            },
                            { value: 'button frame block', label: 
                                el( 'div', {className: 'button frame block'},
                                    el( 'span', {className: 'dvaux-button_link'},
                                        'ボタン',
                                    ),
                                )
                            },
                            { value: 'button radius block', label: 
                                el( 'div', {className: 'button radius block'},
                                    el( 'span', {className: 'dvaux-button_link'},
                                        'ボタン',
                                    ),
                                )
                            },
                            { value: 'button radius bborder block', label: 
                                el( 'div', {className: 'button radius bborder block'},
                                    el( 'span', {className: 'dvaux-button_link'},
                                        'ボタン',
                                    ),
                                )
                            },
                            { value: 'button radius shadow block', label: 
                                el( 'div', {className: 'button radius shadow block'},
                                    el( 'span', {className: 'dvaux-button_link'},
                                        'ボタン',
                                    ),
                                )
                            },
                            { value: 'button radius shadow bborder block', label: 
                                el( 'div', {className: 'button radius shadow bborder block'},
                                    el( 'span', {className: 'dvaux-button_link'},
                                        'ボタン',
                                    ),
                                )
                            },
                            { value: 'button radius frame block', label: 
                                el( 'div', {className: 'button radius frame block'},
                                    el( 'span', {className: 'dvaux-button_link'},
                                        'ボタン',
                                    ),
                                )
                            }
                            ],
                        }),
                    ),
                    el(components.PanelBody,{title: i18n.__( 'ボタンカラー設定' ),className: 'button-color-settings',initialOpen: true}, 
                        el(BaseControl,{label: i18n.__( '背景色' )},
                            el(ColorPalette, {
                                    value: btnBGColor,
                                    onChange: function(newbtnBGColor){
                                        props.setAttributes( { btnBGColor: newbtnBGColor } );
                                    }
                                }
                            )
                        ),
                        el(BaseControl,{label: i18n.__( 'テキスト色' )},
                            el(ColorPalette, {
                                    value: btnTXTColor,
                                    onChange: function(newbtnTXTColor){
                                        props.setAttributes( { btnTXTColor: newbtnTXTColor } );
                                    }
                                }
                            )
                        ),
                        el(BaseControl,{label: i18n.__( '枠線色' )},
                            el(ColorPalette, {
                                    value: btnBorderColor,
                                    onChange: function(newbtnBorderColor){
                                        props.setAttributes( { btnBorderColor: newbtnBorderColor } );
                                    }
                                }
                            )
                        )                  
                    )
                ),
                el( 'div', { className: btntype + ' dvaux' },
                    el( 'span', {
                        className: 'dvaux-button_link '+btnSize,
                        style: {backgroundColor: btnBGColor,color: btnTXTColor,borderColor:btnBorderColor},
                        target: btnTarget ? '_blank':'',
                        rel: btnFollow ? 'nofollow':'',
                    },
                        el( RichText, {
                            placeholder: 'ボタン',
                            keepPlaceholderOnFocus: true,
                            value: attributes.title,
                            isSelected: true,
                            onChange: function( newTitle ) {
                                props.setAttributes( { title: newTitle } );
                            },
                        }),
                    )
                )
            ];
        },

        save: function( props ) {
            var attributes = props.attributes;
            var btnURL = props.attributes.btnURL;
            var btntype = props.attributes.btntype;
            var btnBGColor = props.attributes.btnBGColor;
            var btnTXTColor = props.attributes.btnTXTColor;
            var btnBorderColor = props.attributes.btnBorderColor;
            var btnSize = props.attributes.btnSize;
            var btnFollow = props.attributes.btnFollow;
            var btnTarget = props.attributes.btnTarget;

            return (
                el( 'div', {
                    className: btntype + ' dvaux'
                },
                    el( 'a', {
                        className: 'dvaux-button_link '+btnSize,
                        style: {backgroundColor: btnBGColor,color: btnTXTColor,borderColor:btnBorderColor},
                        target: btnTarget ? '_blank':'',
                        rel: btnFollow ? 'nofollow':'',
                        href: btnURL,
                    },
                    el( RichText.Content, {
                        value: attributes.title
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