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
    var InnerBlocks = wp.editor.InnerBlocks;

    registerBlockType( 'dvaux/headline', { // The name of our block. Must be a string with prefix. Example: my-plugin/my-custom-block.
        title: i18n.__( '見出し' ), // The title of our block.
        description: i18n.__( '様々なデザインの見出しが作成出来ます。' ), // The description of our block.
        icon: 'heading', // Dashicon icon for our block. Custom icons can be added using inline SVGs.
        category: 'auxiliary', // The category of the block.
        attributes: { // Necessary for saving block content.
            title: {
                type: 'text',
            },
            counttext: {
                type: 'text',
            },
            headlinetag:{
                type: 'text',
                default:'div'
            },
            headlinetype: {
                type: 'string',
                default:'solid'
            },
            headlineBGColor: {
                type: 'string',
                default:'#000'
            },
            headlineTXTColor: {
                type: 'string',
                default:'#fff'
            },
            headlineBorderColor:{
                type: 'string',
                default:'#000'
            }
        },

        edit: function( props ) {

            var attributes = props.attributes;
            var headlinetype = props.attributes.headlinetype;
            var headlinetag = props.attributes.headlinetag;
            var headlineBGColor = props.attributes.headlineBGColor;
            var headlineTXTColor = props.attributes.headlineTXTColor;
            var headlineBorderColor = props.attributes.headlineBorderColor;

            var beforeElement = '';

            if(headlinetype.match(/count/)){
            beforeElement = el( 'span', { className: 'before' ,style: {backgroundColor: headlineBorderColor}},
                    el( RichText, {
                        placeholder: '1',
                        keepPlaceholderOnFocus: true,
                        isSelected: true,
                        value: attributes.counttext,
                        onChange: function(newCount) {
                            props.setAttributes( { counttext: newCount } );
                        },
                    }),
                );
            }

            if(headlinetype.match(/fukidasi/)){
                beforeElement = el( 'span', { className: 'after' ,style: {borderTopColor: headlineBGColor}});
             }

            if(headlinetype.match(/headtag/)){
                beforeElement = el( 'span', { className: 'before' ,style: {color: headlineBorderColor}},'●');
             }

            return [
                el( InspectorControls, { key: 'inspector' }, // Display the block options in the inspector panel.
                    el( components.PanelBody, {title: i18n.__( '見出し詳細設定' ),className: 'headline-settings',initialOpen: true},
                        el(BaseControl,{className:'setting-flex'},
                            el(RadioControl,{
                                type: 'radio',
                                className:'radio-button',
                                selected: headlinetag,
                                onChange: function( newheadlinetag ) {
                                    props.setAttributes( { headlinetag: newheadlinetag } );

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
                                }
                                ],
                            })
                        ),
                    ),
                    el( components.PanelBody, {title: i18n.__( '見出しデザイン設定' ),className: 'sc_headline-design',initialOpen: true},
                        el(RadioControl,{
                            type: 'radio',
                            selected: headlinetype,
                            onChange: function( newheadlinetype ) {
                                props.setAttributes( { headlinetype: newheadlinetype } );

                            },
                            options: [
                            { value: 'solid', label: 
                                el( 'div', {className: 'sc_title_wrap solid'},
                                    el( 'div', {className: 'sc_title'},
                                        el( 'span', {className: 'before'}),
                                        'タイトル',
                                        el( 'span', {className: 'after'})
                                    )
                                )
                            },
                            { value: 'bborder a', label: 
                                el( 'div', {className: 'sc_title_wrap bborder a'},
                                    el( 'div', {className: 'sc_title'},
                                        el( 'span', {className: 'before'}),
                                        'タイトル',
                                        el( 'span', {className: 'after'})
                                    )
                                )
                            },
                            { value: 'bborder tb', label: 
                                el( 'div', {className: 'sc_title_wrap bborder tb'},
                                    el( 'div', {className: 'sc_title'},
                                        el( 'span', {className: 'before'}),
                                        'タイトル',
                                        el( 'span', {className: 'after'})
                                    )
                                )
                            },
                            { value: 'bborder b', label: 
                                el( 'div', {className: 'sc_title_wrap bborder b'},
                                    el( 'div', {className: 'sc_title'},
                                        el( 'span', {className: 'before'}),
                                        'タイトル',
                                        el( 'span', {className: 'after'})
                                    )
                                )
                            },
                            { value: 'bborder l', label: 
                                el( 'div', {className: 'sc_title_wrap bborder l'},
                                    el( 'div', {className: 'sc_title'},
                                        el( 'span', {className: 'before'}),
                                        'タイトル',
                                        el( 'span', {className: 'after'})
                                    )
                                )
                            },
                            { value: 'fukidasi', label: 
                                el( 'div', {className: 'sc_title_wrap fukidasi'},
                                    el( 'div', {className: 'sc_title'},
                                        el( 'span', {className: 'before'}),
                                        'タイトル',
                                        el( 'span', {className: 'after'})
                                    )
                                )
                            },
                            { value: 'count', label: 
                                el( 'div', {className: 'sc_title_wrap count'},
                                    el( 'div', {className: 'sc_title'},
                                        el( 'span', {className: 'before'},'1'),
                                        'タイトル',
                                        el( 'span', {className: 'after'})
                                    )
                                )
                            },
                            { value: 'countrad', label: 
                                el( 'div', {className: 'sc_title_wrap countrad'},
                                    el( 'div', {className: 'sc_title'},
                                        el( 'span', {className: 'before'},'1'),
                                        'タイトル',
                                        el( 'span', {className: 'after'})
                                    )
                                )
                            },
                            { value: 'headtag', label: 
                                el( 'div', {className: 'sc_title_wrap headtag'},
                                    el( 'div', {className: 'sc_title'},
                                        el( 'span', {className: 'before'},'●'),
                                        'タイトル',
                                        el( 'span', {className: 'after'})
                                    )
                                )
                            }
                            ],
                        }),
                    ),
                    el(components.PanelBody,{title: i18n.__( '見出しカラー設定' ),className: 'button-color-settings',initialOpen: true}, 
                        el(BaseControl,{label: i18n.__( '枠線色' )},
                            el(ColorPalette, {
                                    value: props.attributes.headlineBorderColor,
                                    onChange: function(newheadlineBorderColor){
                                        props.setAttributes( { headlineBorderColor: newheadlineBorderColor } );
                                    }
                                }
                            )
                        ),
                        el(BaseControl,{label: i18n.__( '背景色' )},
                            el(ColorPalette, {
                                    value: props.attributes.headlineBGColor,
                                    onChange: function(newheadlineBGColor){
                                        props.setAttributes( { headlineBGColor: newheadlineBGColor } );
                                    }
                                }
                            )
                        ),
                        el(BaseControl,{label: i18n.__( 'テキスト色' )},
                            el(ColorPalette, {
                                    value: props.attributes.headlineTXTColor,
                                    onChange: function(newheadlineTXTColor){
                                        props.setAttributes( { headlineTXTColor: newheadlineTXTColor } );
                                    }
                                }
                            )
                        )                 
                    )
                ),
                el( headlinetag, { 
                    className: 'sc_heading '+headlinetype,
                    style: {backgroundColor: headlineBGColor,color: headlineTXTColor,borderColor: headlineBorderColor}
                    },
                    el( 'div', {className: 'sc_title'},
                        beforeElement,
                        el( RichText, {
                            placeholder: 'タイトル',
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
            var headlinetype = (props.attributes.headlinetype) ? props.attributes.headlinetype : 'solid' ;
            var headlinetag = (props.attributes.headlinetag) ? props.attributes.headlinetag : 'div' ;
            var headlineBGColor = (props.attributes.headlineBGColor) ? props.attributes.headlineBGColor : '#000' ;
            var headlineTXTColor = (props.attributes.headlineTXTColor) ? props.attributes.headlineTXTColor : '#fff' ;
            var headlineBorderColor = (props.attributes.headlineBorderColor) ? props.attributes.headlineBorderColor : '#000' ;

            var beforeElement = '';

            if(headlinetype.match(/count/)){
            beforeElement = el( 'span', { className: 'before' ,style: {backgroundColor: headlineBorderColor}},
                        attributes.counttext,
                        );
            }
             if(headlinetype.match(/fukidasi/)){
                beforeElement = el( 'span', { className: 'before' ,style: {borderTopColor: headlineBGColor}});
            }

            if(headlinetype.match(/headtag/)){
                beforeElement = el( 'span', { className: 'before' ,style: {color: headlineBorderColor}},'●');
            }

            return (
                el( headlinetag, { 
                    className: 'sc_heading '+headlinetype,
                    style: {backgroundColor: headlineBGColor,color: headlineTXTColor,borderColor: headlineBorderColor}
                },
                    beforeElement,
                    el( RichText.Content, {
                        tagName: 'div',
                        className: 'sc_title',
                        value: attributes.title
                    } )
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