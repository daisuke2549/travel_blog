( function( editor, components, i18n, element ) {
    var el = element.createElement;
    var Fragment = wp.element.Fragment
    var registerBlockType = wp.blocks.registerBlockType;
    var BlockControls = wp.editor.BlockControls;
    var InspectorControls = wp.editor.InspectorControls;
    var RadioControl = wp.components.RadioControl;
    var BaseControl = wp.components.BaseControl;
    var RangeControl = wp.components.RangeControl;
    var ToggleControl = wp.components.ToggleControl;


    registerBlockType( 'dvaux/star', { // The name of our block. Must be a string with prefix. Example: my-plugin/my-custom-block.
        title: i18n.__( 'スター' ), // The title of our block.
        description: i18n.__( 'スターの挿入が出来ます。' ), // The description of our block.
        icon: 'star-half', // Dashicon icon for our block. Custom icons can be added using inline SVGs.
        category: 'auxiliary', // The category of the block.
        attributes: { // Necessary for saving block content.  
            starScore: {
                type: 'number',
                default: 3
            },             
            starSize: {
                type: 'string',
                default:'medium'
            },
            starText:{
                type: 'boolean',
                default: false,
            }
        },

        edit: function( props ) {

            var attributes = props.attributes;
            var starScore = props.attributes.starScore;
            var starSize = props.attributes.starSize;
            var starText = props.attributes.starText;

            var width = '180';
            var height = '33';
            var scorewidth = '36';

            if(starSize=='big'){
                height = '51';
                width = '280';
                scorewidth = '56';
            }else if(starSize=='small'){
                height = '22';
                width = '120';
                scorewidth = '24';
            }

            if(starScore){
                scoresize = (starScore<=5&&starScore>=0) ? starScore*scorewidth : 5 ;
            }


            return [
                el( InspectorControls, { key: 'inspector' }, // Display the block options in the inspector panel.
                    el( components.PanelBody, {title: i18n.__( 'スター詳細設定' ),className: 'voice-settings',initialOpen: true},
                        el(BaseControl,{label: i18n.__( 'サイズ' ),className:'setting-flex'},
                            el(RadioControl,{
                                type: 'radio',
                                className:'radio-button',
                                selected: starSize,
                                onChange: function( newstarSize ) {
                                    props.setAttributes( { starSize: newstarSize } );

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
                        el(RangeControl,{
                            label:'星の数',
                            value: starScore,
                            min:[0],
                            max:[5],
                            step:[0.1],
                            onChange: function( newstarScore ) {
                                props.setAttributes( { starScore: newstarScore } );
                            }
                        }),
                        el(ToggleControl,{
                            label: i18n.__( '数値表示' ),
                            checked: starText,
                            onChange: function( newstarText) {
                                props.setAttributes( { starText: newstarText } );
                            },
                        }),
                    ),
                ),
                el( 'div',{className:'review_star_wrap'},
                    el( 'div', { className: 'review_star '+starSize,style:{backgroundSize:width+"px",height:height+"px",width:width+"px"}},
                        el( 'div', {
                            className: 'star '+Math.round(starScore),
                            style: {backgroundSize:width+"px",width: scoresize+"px",height:height+"px"}
                        }),
                    ),
                    starText ? el('span',{className:"review_star_score"},starScore):''
                )
            ];
        },

        save: function( props ) {
            var starScore = props.attributes.starScore;
            var starSize = props.attributes.starSize;
            var starText = props.attributes.starText;

            var width = '180';
            var height = '33';
            var scorewidth = '36';

            if(starSize=='big'){
                height = '51';
                width = '280';
                scorewidth = '56';
            }else if(starSize=='small'){
                height = '22';
                width = '120';
                scorewidth = '24';
            }

            if(starScore){
                scoresize = (starScore<=5&&starScore>=0) ? starScore*scorewidth : 5 ;
            }


            return (
                el( 'div',{className:'review_star_wrap'},
                    el( 'div', { className: 'review_star '+starSize,style:{backgroundSize:width+"px",height:height+"px",width:width+"px"}},
                        el( 'div', {
                            className: 'star '+Math.round(starScore),
                            style: {backgroundSize:width+"px",width: scoresize+"px",height:height+"px"}
                        }),
                    ),
                    starText ? el('span',{className:"review_star_score"},starScore):''
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