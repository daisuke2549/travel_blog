( function( editor, components, i18n, element ) {
    var el = element.createElement;
    var registerBlockType = wp.blocks.registerBlockType;
    var RichText = wp.editor.RichText;
    var InspectorControls = wp.editor.InspectorControls;

    var ToggleControl = wp.components.ToggleControl;
    var PanelColor = wp.components.PanelColor;
    var ColorPalette = wp.editor.ColorPalette;
    var BaseControl = wp.components.BaseControl;
    var InnerBlocks = wp.editor.InnerBlocks;

    registerBlockType( 'dvaux/toggle--item', { // The name of our block. Must be a string with prefix. Example: my-plugin/my-custom-block.
        title: i18n.__( 'トグル' ), // The title of our block.
        description: i18n.__( 'トグルが作成出来ます。' ), // The description of our block.
        icon: 'sort', // Dashicon icon for our block. Custom icons can be added using inline SVGs.
        category: 'auxiliary',
        parent: [ 'dvaux/toggle' ],
        attributes: {
            toggle_title:{
                type: 'string'
            },
            toggle_open:{
                type: 'boolean',
                default: false,
            }
        },

        edit: function( props ) {

            var attributes = props.attributes;
            var toggle_title = props.attributes.toggle_title;
            var toggle_open = props.attributes.toggle_open;

            return [
                el( InspectorControls, { key: 'inspector' }, // Display the block options in the inspector panel.
                    el( components.PanelBody, {title: i18n.__( 'トグル詳細設定' ),className: 'voice-settings',initialOpen: true},
                        el(ToggleControl,{
                            label: i18n.__( '開いた状態にする' ),
                            checked: toggle_open,
                            onChange: function( newtoggle_open) {
                                props.setAttributes( { toggle_open: newtoggle_open } );
                            },
                        }),
                    )
                ),
                el( 'div', {className: 'sc_toggle_box '},
                    el( 'div', {className: toggle_open ? ' sc_toggle_title active' : 'sc_toggle_title'},
                        el( RichText, {
                            placeholder: 'タイトル',
                            keepPlaceholderOnFocus: true,
                            value: toggle_title,
                            isSelected: true,
                            onChange: function( newtoggle_title ) {
                                props.setAttributes( { toggle_title: newtoggle_title } );
                            },
                        }),
                    ),
                    el( 'div', {className: 'sc_toggle_content '},
                        el( InnerBlocks, {
                            tagname:'div',
                            key: 'sc_toggle_content',
                        })
                    )
                )
            ];
        },

        save: function( props ) {
            var attributes = props.attributes;
            var toggle_title = props.attributes.toggle_title;
            var toggle_open = props.attributes.toggle_open;

            return (
                el( 'div', {className: 'sc_toggle_box '},
                    el( 'div', {className: toggle_open ? ' sc_toggle_title active' : 'sc_toggle_title'},toggle_title),
                    el( 'div', {className: 'sc_toggle_content '},
                        el( InnerBlocks.Content, {
                            tagname:'div',
                            key: 'sc_toggle_content',
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