( function( editor, components, i18n, element ) {
    var el = element.createElement;
    var registerBlockType = wp.blocks.registerBlockType;
    var BlockControls = wp.editor.BlockControls;
    var InspectorControls = wp.editor.InspectorControls;
    var BaseControl = wp.components.BaseControl;
    var InnerBlocks = wp.editor.InnerBlocks;
    var Fragment = wp.element.Fragment;
    var RichText = wp.editor.RichText;


    registerBlockType( 'dvaux/qanda--item', { // The name of our block. Must be a string with prefix. Example: my-plugin/my-custom-block.
        title: i18n.__( 'Q&A' ), // The title of our block.
        icon: 'list-view', // Dashicon icon for our block. Custom icons can be added using inline SVGs.
        category: 'auxiliary', // The category of the block.
        parent: [ 'dvaux/qanda' ],

        attributes: {
            question: {
                type: 'string',
            },   
            answer: {
                type: 'string',
            },         
        },
        edit: function( props ) {

            var attributes = props.attributes;
            var question = props.attributes.question;
            var answer = props.attributes.answer;


            return [
                el(Fragment,null,
                    el( InspectorControls, { key: 'inspector' }, // Display the block options in the inspector panel.
                        el( components.PanelBody, {title: i18n.__( 'Q&A設定' ),className:'voice-settings',initialOpen: true},
                            
                        ),
                    ),
                    el( 'div', {className: 'diver_qa'},
                        el('div',{className:'diver_question'},
                            el( RichText, {
                                placeholder: '質問',
                                value: question,
                                onChange: function( newQuestion ) {
                                    props.setAttributes( { question: newQuestion } );
                                },
                            }),
                        ),
                        el('div',{className:'diver_answer'},
                            el( RichText, {
                                placeholder: '回答',
                                value: answer,
                                onChange: function( newAnswer ) {
                                    props.setAttributes( { answer: newAnswer } );
                                },
                            }),
                        )
                    )

                )
            ];
        },

        save: function( props ) {
            var attributes = props.attributes;
            var question = props.attributes.question;
            var answer = props.attributes.answer;

            return (
                el( 'div', {className: 'diver_qa'},
                    el( RichText.Content, {
                        tagName: 'div',
                        className: 'diver_question',
                        value: question
                    } ),
                    el( RichText.Content, {
                        tagName: 'div',
                        className: 'diver_answer',
                        value: answer
                    } ),
                )
            );
        },
    });

} )(
    window.wp.editor,
    window.wp.components,
    window.wp.i18n,
    window.wp.element,
);