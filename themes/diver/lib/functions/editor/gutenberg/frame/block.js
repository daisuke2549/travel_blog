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
    var InnerBlocks = wp.editor.InnerBlocks;

    registerBlockType( 'dvaux/frame', { // The name of our block. Must be a string with prefix. Example: my-plugin/my-custom-block.
        title: i18n.__( '囲い枠' ), // The title of our block.
        description: i18n.__( '様々なデザインの囲い枠が作成出来ます。' ), // The description of our block.
        icon: 'feedback', // Dashicon icon for our block. Custom icons can be added using inline SVGs.
        category: 'auxiliary', // The category of the block.
        attributes: { // Necessary for saving block content.
            title: {
                type: 'text',
            },
            frametype: {
                type: 'string',
                default:'inline'
            },
            frameBGColor: {
                type: 'string',
                default:'#fff'
            },
            frameBorderColor:{
                type: 'string',
                default:'#ccc'
            }
        },

        edit: function( props ) {

            var attributes = props.attributes;
            var frametype = props.attributes.frametype;
            var frameBGColor = props.attributes.frameBGColor;
            var frameBorderColor = props.attributes.frameBorderColor;

            var titleElement = '';
            var colorStyle = {color:frameBorderColor,backgroundColor:frameBGColor};

            if(!frametype.match(/titlenone/)){
                    if(!frametype.match(/onframe/)){colorStyle = {backgroundColor: frameBorderColor};}
            titleElement = el( 'div', { className: 'sc_frame_title '+frametype,style: colorStyle },
                        el( RichText, {
                            placeholder: 'タイトル',
                            keepPlaceholderOnFocus: true,
                            value: attributes.title,
                            isSelected: true,
                            onChange: function( newTitle ) {
                                props.setAttributes( { title: newTitle } );
                            },
                        }),
                    );
            }

            return [
                el( InspectorControls, { key: 'inspector' }, // Display the block options in the inspector panel.
                    el( components.PanelBody, {title: i18n.__( '囲い枠デザイン設定' ),className: 'sc_frame-design',initialOpen: true},
                        el(RadioControl,{
                            type: 'radio',
                            selected: frametype,
                            onChange: function( newframetype ) {
                                props.setAttributes( { frametype: newframetype } );

                            },                            
                            options: [
                            { value: 'inline', label: 
                                el( 'div', {className: 'sc_frame_wrap inline'},
                                    el( 'div', {className: 'sc_frame_title inline'},
                                        'タイトル',
                                    ),
                                    el( 'div', {className: 'sc_frame'},
                                        el( 'div', {className: 'sc_frame_text'},
                                            'テキストテキストテキストテキストテキストテキスト',
                                        )
                                    )
                                )
                            },
                            { value: 'normal', label: 
                                el( 'div', {className: 'sc_frame_wrap normal'},
                                    el( 'div', {className: 'sc_frame_title normal'},
                                        'タイトル',
                                    ),
                                    el( 'div', {className: 'sc_frame'},
                                        el( 'div', {className: 'sc_frame_text'},
                                            'テキストテキストテキストテキストテキストテキスト',
                                        )
                                    )
                                )
                            },
                            { value: 'bottom', label: 
                                el( 'div', {className: 'sc_frame_wrap bottom'},
                                    el( 'div', {className: 'sc_frame_title bottom'},
                                        'タイトル',
                                    ),
                                    el( 'div', {className: 'sc_frame'},
                                        el( 'div', {className: 'sc_frame_text'},
                                            'テキストテキストテキストテキストテキストテキスト',
                                        )
                                    )
                                )
                            },
                            { value: 'inframe', label: 
                                el( 'div', {className: 'sc_frame_wrap inframe'},
                                    el( 'div', {className: 'sc_frame_title inframe'},
                                        'タイトル',
                                    ),
                                    el( 'div', {className: 'sc_frame'},
                                        el( 'div', {className: 'sc_frame_text'},
                                            'テキストテキストテキストテキストテキストテキスト',
                                        )
                                    )
                                )
                            },
                            { value: 'onframe', label: 
                                el( 'div', {className: 'sc_frame_wrap onframe'},
                                    el( 'div', {className: 'sc_frame_title onframe'},
                                        'タイトル',
                                    ),
                                    el( 'div', {className: 'sc_frame'},
                                        el( 'div', {className: 'sc_frame_text'},
                                            'テキストテキストテキストテキストテキストテキスト',
                                        )
                                    )
                                )
                            },
                            { value: 'normal titlenone', label: 
                                el( 'div', {className: 'sc_frame_wrap'},
                                    el( 'div', {className: 'sc_frame'},
                                        el( 'div', {className: 'sc_frame_text'},
                                            'テキストテキストテキストテキストテキストテキスト',
                                        )
                                    )
                                )
                            }
                            ],
                        }),
                    ),
                    el(components.PanelBody,{title: i18n.__( '囲い枠カラー設定' ),className: 'button-color-settings',initialOpen: true}, 
                        el(BaseControl,{label: i18n.__( '枠線色' )},
                            el(ColorPalette, {
                                    value: props.attributes.frameBorderColor,
                                    onChange: function(newframeBorderColor){
                                        props.setAttributes( { frameBorderColor: newframeBorderColor } );
                                    }
                                }
                            )
                        ),
                        el(BaseControl,{label: i18n.__( '背景色' )},
                            el(ColorPalette, {
                                    value: props.attributes.frameBGColor,
                                    onChange: function(newframeBGColor){
                                        props.setAttributes( { frameBGColor: newframeBGColor } );
                                    }
                                }
                            )
                        )                 
                    )
                ),
                el( 'div', { className: 'sc_frame_wrap '+frametype },
                    titleElement,
                    el( 'div', {
                        className: 'sc_frame',
                        style: {backgroundColor: frameBGColor,borderColor: frameBorderColor}
                    },
                        el( InnerBlocks, {
                            tagname:'div',
                            className: 'sc_frame_text',
                            key: 'sc_frame_text_block',
                        }),
                    )
                )
            ];
        },

        save: function( props ) {
            var attributes = props.attributes;
            var frametype = props.attributes.frametype;
            var frameBGColor = props.attributes.frameBGColor;
            var frameBorderColor = props.attributes.frameBorderColor;

            var colorStyle = {color:frameBorderColor,backgroundColor:frameBGColor};
            if(!frametype.match(/onframe/)){colorStyle = {backgroundColor: frameBorderColor};}

            var titleElement = el( 'div', { className: 'sc_frame_title '+frametype,style: colorStyle},attributes.title);

            return (
                el( 'div', { className: 'sc_frame_wrap '+frametype },
                    titleElement,
                    el('div', {
                        className: 'sc_frame',
                        style: {backgroundColor: frameBGColor,borderColor: frameBorderColor}
                    },
                        el( InnerBlocks.Content, {
                            tagname:'div',
                            className: 'sc_frame_text',
                            key: 'sc_frame_text_block',
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