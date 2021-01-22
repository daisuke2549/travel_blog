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
    var Autocomplete = wp.editor.Autocomplete;

    registerBlockType( 'dvaux/designlist', { // The name of our block. Must be a string with prefix. Example: my-plugin/my-custom-block.
        title: i18n.__( 'デザインリスト' ), // The title of our block.
        description: i18n.__( '様々なデザインのリストが作成出来ます。' ), // The description of our block.
        icon: 'editor-ul', // Dashicon icon for our block. Custom icons can be added using inline SVGs.
        category: 'auxiliary', // The category of the block.
        attributes: { // Necessary for saving block content.
            values: {
                type: 'array',
                source: 'children',
                selector: 'ol,ul',
                filterElements: true, // <-- selects only nodes with node.nodeType === NODE_ELEMENT
                default: [],
            },
        },

        edit: function( props ) {

            var attributes = props.attributes;
            var btnURL = props.attributes.btnURL;
            var btntype = (props.attributes.btntype) ? props.attributes.btntype : 'sc_designlist li fa_check' ;
            var btnTarget = props.attributes.btnTarget;
            var btnFollow = props.attributes.btnFollow;
            var btnBGColor = props.attributes.btnBGColor;
            var btnTXTColor = props.attributes.btnTXTColor;
            var btnBorderColor = props.attributes.btnBorderColor;
            var btnSize = (props.attributes.btnSize) ? props.attributes.btnSize : 'medium' ;

            return [
                el( InspectorControls, { key: 'inspector' }, // Display the block options in the inspector panel.
                    el( components.PanelBody, {title: i18n.__( 'リストデザイン設定' ),className: 'list-design',initialOpen: true},
                        el(RadioControl,{
                            type: 'radio',
                            selected: btntype,
                            onChange: function( newbtntype ) {
                                props.setAttributes( { btntype: newbtntype } );

                            },                            
                            options: [
                            { value: 'sc_designlist li fa_check', label: 
                                el( 'div', {className: 'sc_designlist li fa_check'},
                                    el( 'ul', {className: 'dvaux-button_link'},
                                        el('li',{},'テキスト'),
                                        el('li',{},'テキスト'),
                                        el('li',{},'テキスト'),
                                    ),
                                )
                            },
                            { value: 'sc_designlist li fa_angle', label: 
                               el( 'div', {className: 'sc_designlist li fa_angle'},
                                    el( 'ul', {className: 'dvaux-button_link'},
                                        el('li',{},'テキスト'),
                                        el('li',{},'テキスト'),
                                        el('li',{},'テキスト'),
                                    ),
                                )
                            },
                            { value: 'sc_designlist li fa_angle_d', label: 
                               el( 'div', {className: 'sc_designlist li fa_angle_d'},
                                    el( 'ul', {className: 'dvaux-button_link'},
                                        el('li',{},'テキスト'),
                                        el('li',{},'テキスト'),
                                        el('li',{},'テキスト'),
                                    ),
                                )
                            },
                            { value: 'sc_designlist li fa_angle_o', label: 
                               el( 'div', {className: 'sc_designlist li fa_angle_o'},
                                    el( 'ul', {className: 'dvaux-button_link'},
                                        el('li',{},'テキスト'),
                                        el('li',{},'テキスト'),
                                        el('li',{},'テキスト'),
                                    ),
                                )
                            },
                            { value: 'sc_designlist li fa_caret', label: 
                               el( 'div', {className: 'sc_designlist li fa_caret'},
                                    el( 'ul', {className: 'dvaux-button_link'},
                                        el('li',{},'テキスト'),
                                        el('li',{},'テキスト'),
                                        el('li',{},'テキスト'),
                                    ),
                                )
                            },
                            { value: 'sc_designlist li fa_arrow', label: 
                                el( 'div', {className: 'sc_designlist li fa_arrow'},
                                    el( 'ul', {className: 'dvaux-button_link'},
                                        el('li',{},'テキスト'),
                                        el('li',{},'テキスト'),
                                        el('li',{},'テキスト'),
                                    ),
                                )
                            },
                            { value: 'sc_designlist li lborder', label: 
                               el( 'div', {className: 'sc_designlist li lborder'},
                                    el( 'ul', {className: 'dvaux-button_link'},
                                        el('li',{},'テキスト'),
                                        el('li',{},'テキスト'),
                                        el('li',{},'テキスト'),
                                    ),
                                )
                            },
                        ],
                        }),
                    ),
                    el(components.PanelBody,{title: i18n.__( 'ボタンカラー設定' ),className: 'button-color-settings',initialOpen: true}, 
                        el(BaseControl,{label: i18n.__( '背景色' )},
                            el(ColorPalette, {
                                    value: props.attributes.btnBGColor,
                                    onChange: function(newbtnBGColor){
                                        props.setAttributes( { btnBGColor: newbtnBGColor } );
                                    }
                                }
                            )
                        ),
                        el(BaseControl,{label: i18n.__( 'テキスト色' )},
                            el(ColorPalette, {
                                    value: props.attributes.btnBGColor,
                                    onChange: function(newbtnTXTColor){
                                        props.setAttributes( { btnTXTColor: newbtnTXTColor } );
                                    }
                                }
                            )
                        ),
                        el(BaseControl,{label: i18n.__( '枠線色' )},
                            el(ColorPalette, {
                                    value: props.attributes.btnBorderColor,
                                    onChange: function(newbtnBorderColor){
                                        props.setAttributes( { btnBorderColor: newbtnBorderColor } );
                                    }
                                }
                            )
                        )                  
                    )
                ),
                el( 'div', {className: btntype},
                    el( RichText, {
                        tagName:'ul',
                        multiline:'li',
                        placeholder: 'デザインリスト',
                        keepPlaceholderOnFocus: true,
                        value: attributes.title,
                        isSelected: true,
                        onChange: function( newTitle ) {
                            props.setAttributes( { title: newTitle } );
                        },
                    }),
                )
            ];
        },

        save: function( props ) {
            var attributes = props.attributes;
            var btnURL = props.attributes.btnURL;
            var btntype = props.attributes.btntype;
            var btnTarget = props.attributes.btnTarget;
            var btnFollow = props.attributes.btnFollow;
            var btnBGColor = props.attributes.btnBGColor;
            var btnTXTColor = props.attributes.btnTXTColor;
            var btnBorderColor = props.attributes.btnBorderColor;
            var btnSize = (props.attributes.btnSize) ? props.attributes.btnSize : 'medium' ;

            return (
                el( 'div', {
                    className: btntype + ' dvaux'
                },
                    el( 'a', {
                        className: 'dvaux-button_link '+btnSize,
                        style: {backgroundColor: btnBGColor,color: btnTXTColor},
                        target: '_blank',
                        href: btnURL,
                    },
                    attributes.title,
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