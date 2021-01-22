( function( wp ) {
    var registerPlugin = wp.plugins.registerPlugin;
    var PluginSidebar = wp.editPost.PluginSidebar;
    var el = wp.element.createElement;
    var Text = wp.components.TextControl;
    var withSelect = wp.data.withSelect;
    var withDispatch = wp.data.withDispatch;

    var PluginPostStatusInfo = wp.editPost.PluginPostStatusInfo;

    var mapSelectToProps = function( select ) {
        return {
            metaFieldValue: select( 'core/editor' )
                .getEditedPostAttribute( 'meta' )
                [ 'sidebar_plugin_meta_block_field' ],
        }
    }

    var mapDispatchToProps = function( dispatch ) {
        return {
            setMetaFieldValue: function( value ) {
                dispatch( 'core/editor' ).editPost(
                    { meta: { sidebar_plugin_meta_block_field: value } }
                );
            }
        }
    }

    var MetaBlockField = function( props ) {
        return el( Text, {
            label: 'Meta Block Field',
            value: props.metaFieldValue,
            onChange: function( content ) {
                props.setMetaFieldValue( content );
            },
        } );
    }

    var MetaBlockFieldWithData = withSelect( mapSelectToProps )( MetaBlockField );
    var MetaBlockFieldWithDataAndActions = withDispatch( mapDispatchToProps )( MetaBlockFieldWithData );

    function MyPostStatusInfoPlugin({}) {
        return el(
            PluginPostStatusInfo,
                { className: 'plugin-sidebar-content' },
                el( MetaBlockFieldWithDataAndActions )
        );
    }



    registerPlugin( 'my-plugin-sidebar', {
        render: MyPostStatusInfoPlugin
    } );
} )( window.wp );