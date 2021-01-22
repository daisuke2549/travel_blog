( function( editor, components, i18n, element ) {
    var el = element.createElement;
    var registerBlockType = wp.blocks.registerBlockType;
    var InspectorControls = wp.editor.InspectorControls;
    var InnerBlocks = wp.editor.InnerBlocks;
    var Fragment = wp.element.Fragment;


    registerBlockType( 'dvaux/qanda', { // The name of our block. Must be a string with prefix. Example: my-plugin/my-custom-block.
        title: i18n.__( 'Q&A' ), // The title of our block.
        icon: 'list-view', // Dashicon icon for our block. Custom icons can be added using inline SVGs.
        category: 'auxiliary', // The category of the block.     
        edit: function( props ) {

            var allowedBlocks = [ 'dvaux/qanda--item' ];
            var template = [ [ 'dvaux/qanda--item' ] ];          

            return [
                el(Fragment,null,
                    el(InnerBlocks, {
                        allowedBlocks:allowedBlocks,
                        template:template,
                        templateLock:false,
                    })
                )
            ];
        },

        save: function( props ) {

            return (
                el(InnerBlocks.Content, null)
            );
        },
    });
} )(    window.wp.editor,
    window.wp.components,
    window.wp.i18n,
    window.wp.element,
);