<?php
 $diver_option_firstview_viewoption = get_option('diver_option_firstview_viewoption','top');

	if($diver_option_firstview_viewoption=="top"){
		 $bool = (is_front_page()&&!is_paged());
	}else if($diver_option_firstview_viewoption=="post"){
		 $bool = (is_front_page()||is_singular());
	}else if($diver_option_firstview_viewoption=="all"){
		 $bool = true;
	}

	 if($bool):

	$diver_option_firstview_content = get_option('diver_option_firstview_content','0');
	$content = '';
	switch ($diver_option_firstview_content) {
		case '1':
		    $diver_firstview_content_img = get_option('fvcontentimg-uploader_img');
		    $diver_firstview_content_title = get_option('diver_firstview_content_title',get_theme_mod('header_background_title'));
		    $diver_firstview_content_title_color = get_option('diver_firstview_content_title_color','#333');
		    $diver_firstview_content_description = get_option('diver_firstview_content_description',get_theme_mod('header_background_text'));
		    $diver_firstview_content_description_color = get_option('diver_firstview_content_description_color','#333');
		    $diver_firstview_content_btntitle = get_option('diver_firstview_content_btntitle',get_theme_mod('header_background_btntext'));
		    $diver_firstview_content_btnurl = get_option('diver_firstview_content_btnurl',get_theme_mod('header_background_btnlink'));
		    $diver_firstview_content_btnbg = get_option('diver_firstview_content_btnbg','#0085ba');
		    $diver_firstview_content_btncolor = get_option('diver_firstview_content_btncolor','#fff');

		    $content = '<div class="header_img_inner_wrap clearfix">';

		    if(!empty($diver_firstview_content_img)):
			    $content .= '<div class="header_inner_icon">';
			    $content .= '<img src="'.$diver_firstview_content_img.'">';
			    $content .= '</div>';
			    $content .= '<div class="header_inner_text">';
		    else:
			    $content .= '<div class="header_inner_text" style="width:100%">';
		    endif;

		    $diver_firstview_content_description = wpautop(do_shortcode($diver_firstview_content_description));

		    $content .= '<div class="header_image_title" style="color:'.$diver_firstview_content_title_color.'">'.$diver_firstview_content_title.'</div>';
		    $content .= '<div class="header_image_desc" style="color:'.$diver_firstview_content_description_color.'">'.$diver_firstview_content_description.'</div>';

		    if(!empty($diver_firstview_content_btnurl)):
		    	$content .= '<div class="button headerbutton"><a href="'.$diver_firstview_content_btnurl.'" style="background:'.$diver_firstview_content_btnbg.';color:'.$diver_firstview_content_btncolor.'">'.$diver_firstview_content_btntitle.'</a></div>';
		    endif;

		    $content .= '</div></div>';

	    	break;
		
		case '2':
		    $diver_firstview_inner_contents_color = get_option('diver_firstview_inner_contents_color','#fff');
		    $diver_firstview_inner_contents = wpautop(do_shortcode(get_option('diver_firstview_inner_contents')));

		    $content = '<div class="firstview_header_inner_content clearfix">';
		    $content .=  '<div style="color:'.$diver_firstview_inner_contents_color.'">'.$diver_firstview_inner_contents.'</div>';
		    $content .= '</div>';
			break;
	}


	$diver_option_firstview = get_option('diver_option_firstview','0');

	switch ($diver_option_firstview) {
		case '1':
		    $diver_option_firstview_simple_style = get_option('diver_option_firstview_simple_style','simple');
		    $diver_option_firstview_simple_style_option = get_option('diver_option_firstview_simple_style_option','length');
		    $diver_firstview_simple_bgcolor = get_option('diver_firstview_simple_bgcolor','#759ab2');
		    $diver_firstview_simple_bgcolor2 = get_option('diver_firstview_simple_bgcolor2','#fff');
		    $diver_firstview_img_fixed = get_option('diver_firstview_img_fixed','1');

		    $html = '<div class="diver_firstview_simple fadeIn animated '.$diver_option_firstview_simple_style.' '.$diver_option_firstview_simple_style_option.'" style="background-color:'.$diver_firstview_simple_bgcolor.'">';
		    $html .= '<div class="firstview_content">'.$content.'</div>'; 
		    $html .= '</div>';
		    echo $html;
			break;
		
		case '2':
			$diver_firstview_slider_size = get_option('diver_firstview_slider_size','big');
				$pickup_tag = get_theme_mod('pickup_tag','pickup'); 
				$pickupposts = get_posts( 'tag='.$pickup_tag );
				if($pickupposts): ?>
					<div id="big_pickup_slider" class="pickup_slider_size_<?php echo $diver_firstview_slider_size; ?>">
							<?php get_template_part('/lib/parts/pickup','post'); ?>
					</div>
			<?php endif;
			break;

		case '3':
		    $diver_firstview_imgbg = get_option('diver_firstview_imgbg','1');
		    $diver_firstview_size = get_option('diver_firstview_size','0');
		    $diver_firstview_size_custom = get_option('diver_firstview_size_custom');
		    $diver_firstview_repeat = get_option('diver_firstview_repeat','repeat');
		    $diver_firstview_img_sposition = get_option('diver_firstview_img_sposition','center');
		    $diver_firstview_fvimgsp = get_option('diver_firstview_fvimgsp','sp');
		    $diver_firstview_bgcolor = get_option('diver_firstview_bgcolor','#fff');
		    $diver_firstview_img_link = get_option('diver_firstview_img_link');

		    $diver_firstview_size_sp = get_option('diver_firstview_size_sp','0');
		    $diver_firstview_size_custom_sp = get_option('diver_firstview_size_custom_sp');

		    $diver_firstview_bg_size_w = get_option('diver_firstview_bg_size_w','0');
		    $diver_firstview_bg_size_w_custom = get_option('diver_firstview_bg_size_w_custom','100');

		    $diver_firstview_bg_size_h = get_option('diver_firstview_bg_size_h','0');
		    $diver_firstview_bg_size_h_custom = get_option('diver_firstview_bg_size_h_custom','100');

		    $diver_firstview_bg_size_w_sp = get_option('diver_firstview_bg_size_w_sp','0');
		    $diver_firstview_bg_size_w_custom_sp = get_option('diver_firstview_bg_size_w_custom_sp','100');

		    $diver_firstview_bg_size_h_sp = get_option('diver_firstview_bg_size_h_sp','0');
		    $diver_firstview_bg_size_h_custom_sp = get_option('diver_firstview_bg_size_h_custom_sp','100');

		    $imgsrc = get_option('fvbgimg-uploader_img',get_theme_mod('header_image'));
		    if(is_mobile()){
			    switch ($diver_firstview_fvimgsp) {
			    	case 'pc':
			    		$imgsrc = get_option('fvbgimg-uploader_img',get_theme_mod('header_image'));
			    		break;
			    	case 'sp':
			    		$imgsrc = get_option('fvbgimgsp-uploader_img');
			    		break;
			    	case 'none':
			    	return;
			    		break;
			    }
			}

		    $height = ($diver_firstview_size)?$diver_firstview_size_custom:'';

		    if(is_mobile()){
		    	$height = ($diver_firstview_size_sp)?$diver_firstview_size_custom_sp:'';
		    }

		    $bgsize_w = ($diver_firstview_bg_size_w)?$diver_firstview_bg_size_w_custom.'%':'auto';
		    $bgsize_h = ($diver_firstview_bg_size_h)?$diver_firstview_bg_size_h_custom.'%':'auto';

		    if(is_mobile()){
		    	$bgsize_w = ($diver_firstview_bg_size_w_sp)?$diver_firstview_bg_size_w_custom_sp.'%':'auto';
			    $bgsize_h = ($diver_firstview_bg_size_h_sp)?$diver_firstview_bg_size_h_custom_sp.'%':'auto';
		    }


		    if($diver_firstview_imgbg){
			    $html = '<div class="diver_firstview_image lazyload '.$diver_firstview_repeat.' fadeIn animated" data-bg="'.$imgsrc.'" style="background-position:'.$diver_firstview_img_sposition.';background-size:'.$bgsize_w.' '.$bgsize_h.';background-color:'.$diver_firstview_bgcolor.'; height:'.$height.'px;">';
			    $html .= '<div class="firstview_content">'.$content.'</div>'; 
			    $html .= '</div>';
		    }else{
		    	$width = ($height)?'auto':'';

			    $html = '<div class="header-image fadeIn animated" style="text-align:'.$diver_firstview_img_sposition.';background-color:'.$diver_firstview_bgcolor.';max-height:'.$height.'px;">';

			    if($diver_firstview_img_link){
				    $html .= '<a href="'.$diver_firstview_img_link.'" class="header-image_link"><img style="max-height:'.$height.'px;width:'.$width.';" src="'.$imgsrc.'"></a>'; 

			    }else{
				    $html .= '<img style="max-height:'.$height.'px;width:'.$width.';" src="'.$imgsrc.'">'; 
				}

			    $html .= '</div>';
		    }
		    echo $html;

			break;
		case '4':
			    $diver_firstview_mov_type = get_option('diver_firstview_mov_type','upload');
			    $diver_firstview_mov_youtubeurl = get_option('diver_firstview_mov_youtubeurl');
			    $diver_firstview_mov_uploadurl = get_option('fvmovie-uploader_img');
			    $diver_firstview_mov_bgimg = get_option('fvmovbgimg-uploader_img');
			    $diver_firstview_mov_size = get_option('diver_firstview_mov_size','full');
			    $diver_firstview_mov_size_custom = get_option('diver_firstview_mov_size_custom');
			    $diver_firstview_mov_filter = get_option('diver_firstview_mov_filter','dark');

			    if(is_mobile()){
			    	$diver_firstview_mov_size = get_option('diver_firstview_mov_size_sp','auto');
			    	$diver_firstview_mov_size_custom  = get_option('diver_firstview_mov_size_sp_custom',0);
			    }

			    $customsize = ($diver_firstview_mov_size=='custom')?$diver_firstview_mov_size_custom.'px':'';


				$html = '<div class="diver_firstview_mov '.$diver_firstview_mov_size.' fadeIn animated" style="height:'.$customsize.';background-image:url('.$diver_firstview_mov_bgimg.')">';

				if($diver_firstview_mov_type=='upload'){
					$html .= '<div class="firstview_video_wrap"><video playsinline muted autoplay loop class="diver_firstview-video" style="background-color: rgb(0, 0, 0); object-position: center center; object-fit: cover; width: 100%; height: auto;"><source src="'.$diver_firstview_mov_uploadurl.'"></video>';
					$html .= '<div class="diver_firstview_mov_cover '.$diver_firstview_mov_filter.'"></div></div>';
				}else{
					$html .= '<div id="diver_firstview_ytplayer" data-property="{videoURL:&#39;'.$diver_firstview_mov_youtubeurl.'&#39;,containment:&#39.diver_firstview_mov_cover&#39,mute: true,showControls: false}"></div>';
					$html .= '<div class="diver_firstview_mov_cover '.$diver_firstview_mov_filter.'"></div>';
				}
				$html .= '<div class="firstview_content">'.$content.'</div>'; 


			    $html .= '</div>';

			   	echo $html;

		break;
	case '5':
				$diver_firstview_other_text = get_option('diver_firstview_other_text');
				$html = '<div class="firstview_custom clearfix">'.apply_filters('the_content',$diver_firstview_other_text).'</div>'; 
			   	echo $html;
		break;

	}
endif;