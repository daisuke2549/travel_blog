( function( editor, components, i18n, element ) {
    var el = element.createElement;
    var Fragment = wp.element.Fragment
    var registerBlockType = wp.blocks.registerBlockType;
    var BlockControls = wp.editor.BlockControls;
    var InspectorControls = wp.editor.InspectorControls;
    var RadioControl = wp.components.RadioControl;
    var PanelColor = wp.components.PanelColor;
    var ColorPalette = wp.editor.ColorPalette;
    var BaseControl = wp.components.BaseControl;
    var FontSizePicker = wp.components.FontSizePicker;
    var AlignmentToolbar = wp.editor.AlignmentToolbar;


    registerBlockType( 'dvaux/icon', { // The name of our block. Must be a string with prefix. Example: my-plugin/my-custom-block.
        title: i18n.__( 'アイコン' ), // The title of our block.
        description: i18n.__( 'アイコンの挿入が出来ます。' ), // The description of our block.
        icon: 'smiley', // Dashicon icon for our block. Custom icons can be added using inline SVGs.
        category: 'auxiliary', // The category of the block.
        attributes: { // Necessary for saving block content.
            iconName: {
                type: 'string',
                default: '500px'
            },   
            iconSize: {
                type: 'number',
                default: 42
            },             
            iconColor: {
                type: 'string',
                default:'#fff'
            },
            iconBGColor:{
                type: 'string',
                default:'#2ac113'
            },
            alignment: {
                type: 'string',
                default: 'center'
            }
        },

        edit: function( props ) {

            var attributes = props.attributes;
            var iconName = props.attributes.iconName;
            var iconColor = props.attributes.iconColor;
            var iconBGColor = props.attributes.iconBGColor;
            var iconSize = props.attributes.iconSize;
            var alignment = props.attributes.alignment;


        	var fontawesomeicon = '500px address-book address-book-o address-card address-card-o adjust adn align-center align-justify align-left align-right amazon ambulance american-sign-language-interpreting anchor android angellist angle-double-down angle-double-left angle-double-right angle-double-up angle-down angle-left angle-right angle-up apple archive area-chart arrow-circle-down arrow-circle-left arrow-circle-o-down arrow-circle-o-left arrow-circle-o-right arrow-circle-o-up arrow-circle-right arrow-circle-up arrow-down arrow-left arrow-right arrow-up arrows arrows-alt arrows-h arrows-v asl-interpreting assistive-listening-systems asterisk at audio-description automobile backward balance-scale ban bandcamp bank bar-chart bar-chart-o barcode bars bath bathtub battery battery-0 battery-1 battery-2 battery-3 battery-4 battery-empty battery-full battery-half battery-quarter battery-three-quarters bed beer behance behance-square bell bell-o bell-slash bell-slash-o bicycle binoculars birthday-cake bitbucket bitbucket-square bitcoin black-tie blind bluetooth bluetooth-b bold bolt bomb book bookmark bookmark-o braille briefcase btc bug building building-o bullhorn bullseye bus buysellads cab calculator calendar calendar-check-o calendar-minus-o calendar-o calendar-plus-o calendar-times-o camera camera-retro car caret-down caret-left caret-right caret-square-o-down caret-square-o-left caret-square-o-right caret-square-o-up caret-up cart-arrow-down cart-plus cc cc-amex cc-diners-club cc-discover cc-jcb cc-mastercard cc-paypal cc-stripe cc-visa certificate chain chain-broken check check-circle check-circle-o check-square check-square-o chevron-circle-down chevron-circle-left chevron-circle-right chevron-circle-up chevron-down chevron-left chevron-right chevron-up child chrome circle circle-o circle-o-notch circle-thin clipboard clock-o clone close cloud cloud-download cloud-upload cny code code-fork codepen codiepie coffee cog cogs columns comment comment-o commenting commenting-o comments comments-o compass compress connectdevelop contao copy copyright creative-commons credit-card credit-card-alt crop crosshairs css3 cube cubes cut cutlery dashboard dashcube database deaf deafness dedent delicious desktop deviantart diamond digg dollar dot-circle-o download dribbble drivers-license drivers-license-o dropbox drupal edge edit eercast eject ellipsis-h ellipsis-v empire envelope envelope-o envelope-open envelope-open-o envelope-square envira eraser etsy eur euro exchange exclamation exclamation-circle exclamation-triangle expand expeditedssl external-link external-link-square eye eye-slash eyedropper fa facebook facebook-f facebook-official facebook-square fast-backward fast-forward fax feed female fighter-jet file file-archive-o file-audio-o file-code-o file-excel-o file-image-o file-movie-o file-o file-pdf-o file-photo-o file-picture-o file-powerpoint-o file-sound-o file-text file-text-o file-video-o file-word-o file-zip-o files-o film filter fire fire-extinguisher firefox first-order flag flag-checkered flag-o flash flask flickr floppy-o folder folder-o folder-open folder-open-o font font-awesome fonticons fort-awesome forumbee forward foursquare free-code-camp frown-o futbol-o gamepad gavel gbp ge gear gears genderless get-pocket gg gg-circle gift git git-square github github-alt github-square gitlab gittip glass glide glide-g globe google google-plus google-plus-circle google-plus-official google-plus-square google-wallet graduation-cap gratipay grav group h-square hacker-news hand-grab-o hand-lizard-o hand-o-down hand-o-left hand-o-right hand-o-up hand-paper-o hand-peace-o hand-pointer-o hand-rock-o hand-scissors-o hand-spock-o hand-stop-o handshake-o hard-of-hearing hashtag hdd-o header headphones heart heart-o heartbeat history home hospital-o hotel hourglass hourglass-1 hourglass-2 hourglass-3 hourglass-end hourglass-half hourglass-o hourglass-start houzz html5 i-cursor id-badge id-card id-card-o ils image imdb inbox indent industry info info-circle inr instagram institution internet-explorer intersex ioxhost italic joomla jpy jsfiddle key keyboard-o krw language laptop lastfm lastfm-square leaf leanpub legal lemon-o level-down level-up life-bouy life-buoy life-ring life-saver lightbulb-o line-chart link linkedin linkedin-square linode linux list list-alt list-ol list-ul location-arrow lock long-arrow-down long-arrow-left long-arrow-right long-arrow-up low-vision magic magnet mail-forward mail-reply mail-reply-all male map map-marker map-o map-pin map-signs mars mars-double mars-stroke mars-stroke-h mars-stroke-v maxcdn meanpath medium medkit meetup meh-o mercury microchip microphone microphone-slash minus minus-circle minus-square minus-square-o mixcloud mobile mobile-phone modx money moon-o mortar-board motorcycle mouse-pointer music navicon neuter newspaper-o object-group object-ungroup odnoklassniki odnoklassniki-square opencart openid opera optin-monster outdent pagelines paint-brush paper-plane paper-plane-o paperclip paragraph paste pause pause-circle pause-circle-o paw paypal pencil pencil-square pencil-square-o percent phone phone-square photo picture-o pie-chart pied-piper pied-piper-alt pied-piper-pp pinterest pinterest-p pinterest-square plane play play-circle play-circle-o plug plus plus-circle plus-square plus-square-o podcast power-off print product-hunt puzzle-piece qq qrcode question question-circle question-circle-o quora quote-left quote-right ra random ravelry rebel recycle reddit reddit-alien reddit-square refresh registered remove renren reorder repeat reply reply-all resistance retweet rmb road rocket rotate-left rotate-right rouble rss rss-square rub ruble rupee s15 safari save scissors scribd search search-minus search-plus sellsy send send-o server share share-alt share-alt-square share-square share-square-o shekel sheqel shield ship shirtsinbulk shopping-bag shopping-basket shopping-cart shower sign-in sign-language sign-out signal signing simplybuilt sitemap skyatlas skype slack sliders slideshare smile-o snapchat snapchat-ghost snapchat-square snowflake-o soccer-ball-o sort sort-alpha-asc sort-alpha-desc sort-amount-asc sort-amount-desc sort-asc sort-desc sort-down sort-numeric-asc sort-numeric-desc sort-up soundcloud space-shuttle spinner spoon spotify square square-o stack-exchange stack-overflow star star-half star-half-empty star-half-full star-half-o star-o steam steam-square step-backward step-forward stethoscope sticky-note sticky-note-o stop stop-circle stop-circle-o street-view strikethrough stumbleupon stumbleupon-circle subscript subway suitcase sun-o superpowers superscript support table tablet tachometer tag tags tasks taxi telegram television tencent-weibo terminal text-height text-width th th-large th-list themeisle thermometer thermometer-0 thermometer-1 thermometer-2 thermometer-3 thermometer-4 thermometer-empty thermometer-full thermometer-half thermometer-quarter thermometer-three-quarters thumb-tack thumbs-down thumbs-o-down thumbs-o-up thumbs-up ticket times times-circle times-circle-o times-rectangle times-rectangle-o tint toggle-down toggle-left toggle-off toggle-on toggle-right toggle-up trademark train transgender transgender-alt trash trash-o tree trello tripadvisor trophy truck try tty tumblr tumblr-square turkish-lira tv twitch twitter twitter-square umbrella underline undo universal-access university unlink unlock unlock-alt unsorted upload usb usd user user-circle user-circle-o user-md user-o user-plus user-secret user-times users vcard vcard-o venus venus-double venus-mars viacoin viadeo viadeo-square video-camera vimeo vimeo-square vine vk volume-control-phone volume-down volume-off volume-up warning wechat weibo weixin whatsapp wheelchair wheelchair-alt wifi wikipedia-w window-close window-close-o window-maximize window-minimize window-restore windows won wordpress wpbeginner wpexplorer wpforms wrench xing xing-square y-combinator y-combinator-square yahoo yc yc-square yelp yen yoast youtube youtube-play youtube-square';
		    var fontawesomeiconArray = fontawesomeicon.split(' ');


			var iconArray = [];
	         fontawesomeiconArray.forEach(function(val) {

	         	iconArray.push({ value: val, label:
	                el( 'div', { className: 'sc_icon'},
	                    el( 'i', {
	                        className: 'fa fa-'+val,
	                    }),
	                )
                });

			});



            return [
                el(Fragment,null,
                    el(BlockControls,null,
                        el(AlignmentToolbar,
                            {
                                value: alignment,
                                onChange: function onChangeAlignment( newAlignment ) {
                                    props.setAttributes( { alignment: newAlignment } );
                                },
                            }
                        )
                    )
                ),
                el( InspectorControls, { key: 'inspector' }, // Display the block options in the inspector panel.
                    el( components.PanelBody, {title: i18n.__( 'アイコン詳細設定' ),className: 'icon-settings',initialOpen: true},
                    	el(FontSizePicker, {
                    		fontSizes:[
								{ name: '小',slug: 'small', size: 24 },
								{ name: '中',slug: 'midle', size: 42 },
								{ name: '大',slug: 'big', size: 72 },
							],
							fallbackFontSize:16,
                            value: iconSize,
                            onChange: function( newiconSize ) {
                                props.setAttributes( { iconSize: newiconSize } );

                            }, 
                            withSlider:true
                    	}),
                    	el(BaseControl,{label: i18n.__( 'アイコン一覧' )},
	                    	el(RadioControl,{
	                            type: 'radio',
	                            className:'icon_select_area',
	                            selected: iconName,
	                            onChange: function( newiconName ) {
	                                props.setAttributes( { iconName: newiconName } );

	                            },                            
	                            options: iconArray
	                         })
	                    )
                    ),
                    el(components.PanelBody,{title: i18n.__( 'カラー設定' ),className: 'icon-color-settings',initialOpen: true}, 
                        el(BaseControl,{label: i18n.__( 'アイコン色' )},
                            el(ColorPalette, {
                                    value: iconColor,
                                    onChange: function(newiconColor){
                                        props.setAttributes( { iconColor: newiconColor } );
                                    }
                                }
                            )
                        ),
                        el(BaseControl,{label: i18n.__( '背景色' )},
                            el(ColorPalette, {
                                    value: iconBGColor,
                                    onChange: function(newiconBGColor){
                                        props.setAttributes( { iconBGColor: newiconBGColor } );
                                    }
                                }
                            )
                        )              
                    )
                ),
                el( 'div', { className: 'dvaux_icon',style:{textAlign:  alignment,backgroundColor:iconBGColor}},
                    el( 'i', {
                        className: 'fa fa-'+iconName,
                        style: {color: iconColor,fontSize:iconSize}
                    }),
                )
            ];
        },

        save: function( props ) {
            var attributes = props.attributes;
            var iconName = props.attributes.iconName;
            var iconColor = props.attributes.iconColor;
            var iconBGColor = props.attributes.iconBGColor;
            var iconSize = props.attributes.iconSize;
            var alignment = props.attributes.alignment;

            return (
                el( 'div', { className: 'dvaux_icon',style:{textAlign:  alignment,backgroundColor:iconBGColor}},
                    el( 'i', {
                        className: 'fa fa-'+iconName,
                        style: {color: iconColor,fontSize:iconSize}
                    }),
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