( function( editor, components, i18n, element ) {
    var el = element.createElement;
    var registerBlockType = wp.blocks.registerBlockType;
    var RichText = wp.editor.RichText;
    var BlockControls = wp.editor.BlockControls;
    var InspectorControls = wp.editor.InspectorControls;
    var TextControl = wp.components.TextControl;
    var RadioControl = wp.components.RadioControl;
    var FontSizePicker = wp.components.FontSizePicker;

    var ButtonGroup = wp.components.ButtonGroup;
    var Button = wp.components.Button;

    var ToggleControl = wp.components.ToggleControl;
    var PanelColor = wp.components.PanelColor;
    var ColorPalette = wp.editor.ColorPalette;
    var BaseControl = wp.components.BaseControl;
    var InnerBlocks = wp.editor.InnerBlocks;
    var MediaUpload = wp.editor.MediaUpload;

    registerBlockType( 'dvaux/balloon', { // The name of our block. Must be a string with prefix. Example: my-plugin/my-custom-block.
        title: i18n.__( '吹き出し' ), // The title of our block.
        description: i18n.__( '吹き出しが作成出来ます。' ), // The description of our block.
        icon: 'format-chat', // Dashicon icon for our block. Custom icons can be added using inline SVGs.
        category: 'auxiliary', // The category of the block.
        attributes: {
            direction:{
                type: 'string'
            }
        },

        edit: function( props ) {

            var attributes = props.attributes;
            var direction = (props.attributes.direction) ? props.attributes.direction : 'left' ;

            return [
                el( InspectorControls, { key: 'inspector' }, // Display the block options in the inspector panel.
                    el( components.PanelBody, {title: i18n.__( '会話詳細設定' ),className: 'voice-settings',initialOpen: true},
                        el(BaseControl,{label: i18n.__( '方向' )},
                            el(RadioControl,{
                                type: 'radio',
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
                                },
                                {
                                    value:"top",
                                    label:"上"
                                },
                                {
                                    value:"bottom",
                                    label:"下"
                                }
                                ],
                            })
                        )
                    ),
                    el(components.PanelBody,{title: i18n.__( '吹き出しカラー設定' ),className: 'button-color-settings',initialOpen: true}, 
                        el(BaseControl,{label: i18n.__( '背景色' )},
                            el(ColorPalette, {
                                    value: props.attributes.voiceBGColor,
                                    onChange: function(newvoiceBGColor){
                                        props.setAttributes( { voiceBGColor: newvoiceBGColor } );
                                    }
                                }
                            )
                        ),
                        el(BaseControl,{label: i18n.__( '枠色' )},
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

                el( 'div', {className: 'sc_balloon '+direction},
                    el( RichText, {
                        placeholder: '名前',
                        keepPlaceholderOnFocus: true,
                        value: attributes.text,
                        isSelected: true,
                        onChange: function( newText ) {
                            props.setAttributes( { text: newText } );
                        },
                    })
                )
            ];
        },

        save: function( props ) {
            var attributes = props.attributes;
            var attributes = props.attributes;
            var direction = (props.attributes.direction) ? props.attributes.direction : 'left' ;

            return (
                el( 'div', {className: 'sc_balloon '+direction},
                        attributes.text,
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