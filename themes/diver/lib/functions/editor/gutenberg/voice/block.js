( function( editor, components, i18n, element ) {
    var el = element.createElement;
    var registerBlockType = wp.blocks.registerBlockType;
    var RichText = wp.editor.RichText;
    var BlockControls = wp.editor.BlockControls;
    var InspectorControls = wp.editor.InspectorControls;
    var TextControl = wp.components.TextControl;
    var RadioControl = wp.components.RadioControl;

    var ButtonGroup = wp.components.ButtonGroup;
    var Button = wp.components.Button;


    var ToggleControl = wp.components.ToggleControl;
    var PanelColor = wp.components.PanelColor;
    var ColorPalette = wp.editor.ColorPalette;
    var BaseControl = wp.components.BaseControl;
    var MediaUpload = wp.editor.MediaUpload;

    registerBlockType( 'dvaux/voice', { // The name of our block. Must be a string with prefix. Example: my-plugin/my-custom-block.
        title: i18n.__( '会話' ), // The title of our block.
        description: i18n.__( '会話が作成出来ます。' ), // The description of our block.
        icon: 'format-chat', // Dashicon icon for our block. Custom icons can be added using inline SVGs.
        category: 'auxiliary', // The category of the block.
        attributes: { // Necessary for saving block content.
            text: {
                type: 'text',
            },
            name: {
                type: 'text',
            },
            icon: {
                type: 'string',
            },
            voiceIconimage: {
                type: 'string',
            },
            voiceIconimageURL: {
                type: 'string',
            },            
            voiceBGColor: {
                type: 'string',
                default:'#fff'
            },
            voiceTXTColor: {
                type: 'string',
                default:'#000'
            },
            direction:{
                type: 'string',
                default:'left'
            },
            balloonType:{
                type: 'string',
                default:'sc_balloon'
            },
            iconInverted:{
                type: 'boolean',
                default: false,
            }
        },

        edit: function( props ) {

            var attributes = props.attributes;
            var voiceBGColor = props.attributes.voiceBGColor;
            var voiceTXTColor = props.attributes.voiceTXTColor;

            var direction = props.attributes.direction;
            var balloonType = props.attributes.balloonType;
            var iconInverted = props.attributes.iconInverted;

             var icon_option = [];

            icon_option.push({ value: attributes.voiceIconimageURL, label:
                el( 'div', {className: 'voice_icon'},
                    el( 'img', {
                        src:attributes.voiceIconimageURL,
                    })
                )
            });

             for (  var i = 1;  i < my_script_vars.icon.length; i++  ) {
                icon_option.push({ value: my_script_vars.icon[i], label: 
                    el( 'div', {className: 'voice_icon'},
                        el( 'img', {
                            src:my_script_vars.icon[i],
                        })
                    )
                });
             }
            style:{borderColor:'transparent '+voiceBGColor+' transparent transparent'}

             var customElment = "";
             var customElment2 = "";

             if(balloonType == "think_balloon"){
                customElment = el('span',{
                    className:'custom_voice '+direction,
                    style:{backgroundColor:voiceBGColor}
                });

                customElment2 = el('span',{
                    className:'custom_voice2 '+direction,
                    style:{backgroundColor:voiceBGColor}
                });

             }else{
                if(direction == "left"){
                    customElment = el('span',{
                        className:'custom_voice '+direction,
                        style:{borderColor:'transparent '+voiceBGColor+' transparent transparent'}
                    });
                }else{
                    customElment = el('span',{
                        className:'custom_voice '+direction,
                        style:{borderColor:'transparent transparent transparent '+voiceBGColor}
                    });
                }
             }

            return [
                el( InspectorControls, { key: 'inspector' }, // Display the block options in the inspector panel.
                    el( components.PanelBody, {title: i18n.__( '会話詳細設定' ),className: 'voice-settings',initialOpen: true},
                        el(BaseControl,{label: i18n.__( '方向' ),className:'setting-flex'},
                            el(RadioControl,{
                                type: 'radio',
                                className:'radio-button',
                                selected: direction,
                                onChange: function( newdirection ) {
                                    props.setAttributes( { direction: newdirection } );

                                },
                                options: [{
                                    value:"left",
                                    label:"左"
                                },
                                {
                                    value:"right",
                                    label:"右"
                                }
                                ],
                            })
                        ),
                        el(BaseControl,{label: i18n.__( 'タイプ' ),className:'setting-flex'},
                            el(RadioControl,{
                                type: 'radio',
                                className:'radio-button',
                                selected: balloonType,
                                onChange: function( newballoonType ) {
                                    props.setAttributes( { balloonType: newballoonType } );

                                },
                                options: [{
                                    value:"sc_balloon",
                                    label:"吹き出し"
                                },
                                {
                                    value:"think_balloon",
                                    label:"心の声"
                                }
                                ],
                            })
                        ),
                        el(ToggleControl,{
                            label: i18n.__( 'アイコンを反転' ),
                            checked: props.attributes.iconInverted,
                            onChange: function( newiconInverted) {
                                props.setAttributes( { iconInverted: newiconInverted } );
                            },
                        }),
                    ),
                    el( components.PanelBody, {title: i18n.__( '会話アイコン画像設定' ),className: 'sc_voice-design',initialOpen: true},
                        el(MediaUpload,{
                            type: 'image',
                            value: attributes.voiceIconimage,
                            onSelect: function( media ) {
                                return props.setAttributes( {
                                    voiceIconimageURL: media.url,
                                    voiceIconimage: media.id,
                                } );
                            },
                            render: function( obj ) {
                                return el( Button, {
                                    className: 'components-button icon-button is-button is-default is-large',
                                    onClick: obj.open
                                },
                                i18n.__( 'アイコン設定' )
                                );
                            }
                        }),
                        el(RadioControl,{
                            type: 'radio',
                            selected: attributes.icon,
                            onChange: function( newIcon ) {
                                props.setAttributes( { icon: newIcon } );

                            },
                            options: icon_option,
                        }),
                    ),
                    el(components.PanelBody,{title: i18n.__( '会話カラー設定' ),className: 'button-color-settings',initialOpen: true}, 
                        el(BaseControl,{label: i18n.__( '背景色' )},
                            el(ColorPalette, {
                                    value: props.attributes.voiceBGColor,
                                    onChange: function(newvoiceBGColor){
                                        props.setAttributes( { voiceBGColor: newvoiceBGColor } );
                                    }
                                }
                            )
                        ),
                        el(BaseControl,{label: i18n.__( 'テキスト色' )},
                            el(ColorPalette, {
                                    value: props.attributes.voiceTXTColor,
                                    onChange: function(newvoiceTXTColor){
                                        props.setAttributes( { voiceTXTColor: newvoiceTXTColor } );
                                    }
                                }
                            )
                        )
                    )
                ),

                el( 'div', {className: 'voice clearfix n_bottom '+direction},
                    el('div',{className: 'icon'},
                        el('img',{src: attributes.icon,className:iconInverted ? 'voice_img inverted' : 'voice_img'}),
                        el('div',{className: 'name'},
                            el( TextControl, {
                                placeholder: '名前',
                                keepPlaceholderOnFocus: false,
                                value: attributes.name,
                                isSelected: false,
                                onChange: function( newName ) {
                                    props.setAttributes( { name: newName } );
                                },
                            })
                        )
                    ),
                    el('div',{className: 'text '+balloonType +' '+direction,style: {backgroundColor: voiceBGColor,color: voiceTXTColor}},
                        customElment,
                        customElment2,
                        el( RichText, {
                            placeholder: 'テキスト',
                            keepPlaceholderOnFocus: true,
                            value: attributes.text,
                            isSelected: true,
                            onChange: function( newText ) {
                                props.setAttributes( { text: newText } );
                            },
                        })
                    )
                )
            ];
        },

        save: function( props ) {
            var attributes = props.attributes;
            var voiceBGColor = props.attributes.voiceBGColor;
            var voiceTXTColor = props.attributes.voiceTXTColor;
            var direction = props.attributes.direction;
            var balloonType = props.attributes.balloonType;
            var iconInverted = props.attributes.iconInverted;


            var customElment = "";
            var customElment2 = "";

             if(balloonType == "think_balloon"){
                customElment = el('span',{
                    className:'custom_voice '+direction,
                    style:{backgroundColor:voiceBGColor}
                });

                customElment2 = el('span',{
                    className:'custom_voice2 '+direction,
                    style:{backgroundColor:voiceBGColor}
                });

             }else{
                if(direction == "left"){
                    customElment = el('span',{
                        className:'custom_voice '+direction,
                        style:{borderColor:'transparent '+voiceBGColor+' transparent transparent'}
                    });
                }else{
                    customElment = el('span',{
                        className:'custom_voice '+direction,
                        style:{borderColor:'transparent transparent transparent '+voiceBGColor}
                    });
                }
             }

            return (
                el( 'div', {className: 'voice clearfix n_bottom '+direction},
                    el('div',{className: 'icon'},
                        el('img',{src: attributes.icon,className:iconInverted ? 'voice_img inverted' : 'voice_img'}),
                        el('div',{className: 'name'},
                            attributes.name,
                        )
                    ),
                    el('div',{className: 'text '+balloonType +' '+ direction,style: {backgroundColor: voiceBGColor,color: voiceTXTColor}},
                        customElment,
                        customElment2,
                        el( RichText.Content, {
                            tagName: 'span',
                            value: attributes.text
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