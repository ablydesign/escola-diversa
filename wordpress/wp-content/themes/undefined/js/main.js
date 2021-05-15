var ANIMATIOM = PAGE || {};
(function($, document, window) {

  ANIMATIOM.home = function() {
    var window_size = $( window ).width();
    if ($('body').hasClass('home') && window_size > 991) {
      var $ball01 = $('#home_tool-box_ball-left-midle');
      var $ball02 = $('#home_school-diverse-top-lef');
      var $ball03 = $('#home_school-diverse-top-right');
      var $ball04 = $('#home_school-diverse-bottom-right');
      var $ball05 = $('#home_justification-ball-top-left');
      var $ball06 = $('#home_justification-ball-top-right');
      var $ball07 = $('#home_justification-smille-top-right');
      var $ball08 = $('#home_justification-smille-top-left');
      var $ball09 = $('#home_justification-ball-bottom-right');
      var $ball10 = $('#home_depoiments-ball-top-left');
      var $ball11 = $('#home_contact-ball-top-right');

      gsap.to($ball01, {
        y: -200,
        scrollTrigger: {
            trigger: $ball01,
            start: 'top center',
            end: 'bottom top',
            scrub: 0.5,
            //markers: true
        }
      });

      gsap.to($ball02, {
        y: -100,
        scrollTrigger: {
            trigger: $ball02,
            start: 'bottom center',
            end: 'bottom top',
            scrub: 0.5,
            //markers: true
        }
      });

      gsap.to($ball03, {
        y: -50,
        scrollTrigger: {
            trigger: $ball03,
            start: 'top center',
            end: 'bottom top',
            scrub: 0.5,
            //markers: true
        }
      });

      gsap.to($ball04, {
        y: -100,
        scrollTrigger: {
            trigger: $ball04,
            start: 'top center',
            end: 'bottom top',
            scrub: 0.5,
            //markers: true
        }
      });

      gsap.to($ball05, {
        y: -50,
        scrollTrigger: {
            trigger: $ball05,
            start: 'top center',
            end: 'bottom top',
            scrub: 0.5,
            //markers: true
        }
      });

      gsap.to($ball06, {
        y: -200,
        scrollTrigger: {
            trigger: $ball06,
            start: 'top center',
            end: 'bottom top',
            scrub: 0.5,
            //markers: true
        }
      });

      gsap.to($ball07, {
        y: -150,
        scrollTrigger: {
            trigger: $ball07,
            start: 'top center',
            end: 'bottom top',
            scrub: 0.5,
            //markers: true
        }
      });

      gsap.to($ball08, {
        y: -50,
        scrollTrigger: {
            trigger: $ball08,
            start: 'top center',
            end: 'bottom top',
            scrub: 0.5,
            //markers: true
        }
      });

      gsap.to($ball09, {
        y: -100,
        scrollTrigger: {
            trigger: $ball09,
            start: 'top center',
            end: 'bottom top',
            scrub: 0.5,
            // markers: true
        }
      });

      gsap.to($ball10, {
        y: -100,
        scrollTrigger: {
            trigger: $ball10,
            start: 'top',
            end: 'center',
            scrub: 0.7,
            //markers: true
        }
      });

      gsap.to($ball11, {
        y: -50,
        scrollTrigger: {
            trigger: $ball11,
            start: 'top',
            end: 'bottom',
            scrub: 0.5,
            //markers: true
        }
      });
    }
  }

  ANIMATIOM.init = function() {
    console.log('carregou animações')
    ANIMATIOM.home();
  }
})(jQuery, document, window);

ANIMATIOM.init();
var PAGE = PAGE || {};
(function($, document, window) {

	PAGE.address = null;
	PAGE.shipping = null;
	PAGE.payment = {
		rate: 0,
		sub: 0,
		quant: 1
	}

	PAGE.get_cookie = function(cname) {
		var name = cname + "=";
		var decodedCookie = decodeURIComponent(document.cookie);
		var ca = decodedCookie.split(';');
		for(var i = 0; i <ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) == ' ') {
				c = c.substring(1);
			}
			if (c.indexOf(name) == 0) {
				return c.substring(name.length, c.length);
			}
		}
		return '';
	}

	PAGE.field_required = function($form) {
		var _errors = 0;
		$form.find('input.required').each(function() {
			var _val = $(this).val();
			if (_val.length == 0) {
				$(this).addClass('error');
				++_errors;
			} else {
				$(this).removeClass('error');
			}
		});
		return _errors;
	}

	PAGE.banner_accordion = function() {
		if ($('#banner-home_accodrion').length) {
			
			const _length = $('#banner-home_accodrion').find('.banner-item').length;
			const _width  = $('#banner-home_accodrion').width();
			const _width_header = $('#banner-home_accodrion').find('.banner-item').first().find('.banner-item_header').width();
			const _width_content = _width - ((_width_header) * _length) - 85;
			const _width_open = _width - (83 * _length) - 85;

			$('.banner-item_header').on('click', function(e) {
				var $item = $(this).closest('.banner-item');
				var $container = $(this).closest('.banner-home_accodrion');

				if ($item.hasClass('open')) {
					$item.removeClass('open');
					$item.find('.banner-item_content').width(0);
					$item.attr('title', 'Clique para ver vídeo');

					YOUTUBE.current.pauseVideo();

					setTimeout(function() {
						$container.removeClass('open');
					}, 100)

				} else {
					$('.banner-item').removeClass('open');
					$('.banner-item').find('.banner-item_content').width(0);
					
					$item.addClass('open');
					$item.find('.banner-item_content').width(_width_open);
					$item.attr('title', 'Clique para fechar vídeo');

					$container.addClass('open');

					if ($item.hasClass('has-video'))
						YOUTUBE.change_video(parseInt($item.attr('data-count')));
				}
			});
		}
	}

	PAGE.listener_menu = function() {
		$('#menu-target').on('click', function() {
			$('#menu-target').toggleClass('open');
			$('#header').toggleClass('show');
		});
	}

	PAGE.leia_mais = function() {
		console.log('leia mais');
		if ($('.documentaries-item').length) {
			$('.documentaries-item').each(function(elem, index){
				console.log('leia mais ++');
				var container_height = $(this).find('.documentaries-item_inner .text.excerpt').height();
				var inner_height = $(this).find('.documentaries-item_inner .text.excerpt .text-inner').height();
				
				console.log('inner_height', inner_height);
				console.log('container_height', container_height);

				if (inner_height > container_height) {
					$(this).find('.documentaries-item_inner .permalink-content').show();
				}
			});
			$('.documentaries-item').find('.documentaries-item_inner .permalink-content').on('click', '.btn-permalink', function() {
				var inner_height = $(this).closest('.documentaries-item').find('.documentaries-item_inner .text.excerpt .text-inner').height();

				if ($(this).closest('.documentaries-item').hasClass('open')) {
					$(this).closest('.documentaries-item').find('.documentaries-item_inner .text.excerpt').height(75);
				} else {
					$(this).closest('.documentaries-item').find('.documentaries-item_inner .text.excerpt').height(inner_height).toggleClass('open');
				}

				$(this).closest('.documentaries-item').toggleClass('open');
				
			});
		}
	}

	PAGE.nav_scroll = function () {
		$(window).on('scroll', function () {
			var current_position = $(this).scrollTop();
			if (current_position > 400) {
				$('#header').addClass('fixed');
			} else {
				$('#header').removeClass('fixed');
			}
		});
	}

	PAGE.target_link = function() {
		$('body').find('a[href^="#"]').on('click', function (event) {
			event.preventDefault();
			var $el = $(this);
			var id = $el.attr('href');

			$('html, body').animate({
				scrollTop: $(id).offset().top - 200
			}, 2000);

			return false;
		});
	}

	PAGE.depoiments_home = function() {
		if ($('#depoiments-init').length) {
				$('#depoiments-init').slick({
					slidesToShow: 1,
					slidesToScroll: 1,
					autoplay: false,
					autoplaySpeed: 2000,
					infinite: false,
					arrows: true,
					dots: false,
					mobileFirst: true,
					responsive: [
						{
							breakpoint: 991,
							settings: {
								slidesToShow: 2
							}
						}
					],
					prevArrow:'<button type="button" class="btn-slick slick-prev"><i class="bx bx-left-arrow-alt"></i></button>',
					nextArrow:'<button type="button" class="btn-slick slick-next"><i class="bx bx-right-arrow-alt"></i></button>',
				}).on('setPosition', function (event, slick) {
					slick.$slides.css('height', slick.$slideTrack.height() + 'px');
					slick.$slides.find('> div').css('height', slick.$slideTrack.height() + 'px');
				});
		}
	}

	PAGE.clamp = function() {
		if ($('.clamp').length) {
			$('.clamp').each(function(){
				var text = $(this).find('p')[0];
				var lines = parseInt($(this).attr('data-lines'));
				console.log('lines', lines);
				$clamp(text, {clamp: lines});
			});
		}
	}

	PAGE.ideas_masonry = function() {
		var window_size = $( window ).width();
		if ($('#ideas-list_masonry').length && window_size > 767) {
			$('#ideas-list_masonry').find('.ideas-column.even').first().addClass('first-of-type');
			$('#ideas-list_masonry').find('.ideas-column.odd').first().addClass('first-of-type');
			setTimeout(function() {
				$('#ideas-list_masonry').masonry({
					itemSelector: '.ideas-column'
				});
			}, 0);	
		}
	}

	PAGE.ajax_more_diversity_request = function() {
		if ($('#home_more-diversity').length) {
			$('a.ajax-more-diversity').on('click', function(e) {
				e.preventDefault();
				var ajax_src = $(this).attr('data-src');
				PAGE.ajax_fancybox(ajax_src, '');
			});
		}
	}

	PAGE.ajax_fancybox_request = function() {
		if ($('.btn-ajax_fancybox').length) {
			$('a.btn-ajax_fancybox[href^="http"]').on('click', function(e) {
				e.preventDefault();
				var ajax_src = $(this).attr('href');
				PAGE.ajax_fancybox(ajax_src, 'page-ajax_inner');
			});
		}
	}

	PAGE.ajax_manifest_request = function() {
		if ($('#btn-manifest').length) {
			$('a.btn-ajax_fancybox[href^="http"]').on('click', function(e) {
				e.preventDefault();
				var ajax_src = $(this).attr('href');
				PAGE.ajax_fancybox(ajax_src, 'page-ajax_inner');
			});
		}
	}

	PAGE.listener_contact_toast = function() {
		if ($('.wpcf7-response-output').length) {
			$('.wpcf7-response-output').on('click', function() {
				$('.wpcf7-response-output').slideUp();
			});
		}
	}

	PAGE.page_ideas_fancybox = function() {
		if ($('#page-ideas').length) {
			$('a[data-rel="resultado"]').on('click', function(e) {
				e.preventDefault();
				var ajax_src = $(this).attr('href');
				PAGE.ajax_fancybox(ajax_src, 'single-ajax_inner');
			});

			$('a[data-rel="audio"]').on('click', function(e) {
				e.preventDefault();
				var ajax_src = $(this).attr('href');
				PAGE.ajax_fancybox(ajax_src, 'single-ajax_inner');
			});
		}
	}

	PAGE.ajax_fancybox = function(ajax_src, className) {
		$.fancybox.open({
			src  : ajax_src,
			type : 'ajax',
			opts : {
				// modal: true,
				protect: true,
				infobar: false,
				toolbar: false,
				touch: false,
				slideClass: "fancybox-ajax-content",
				baseClass: "fancybox-ajax-container " + className,
				afterShow: function() {
					if ($('.ajax-content-list').length){
						console.log('-- beforeShow --');
						$('.link-content').each(function(e) {
							$(this).find('a').attr('target', '_blank');
						})
					}
				},
				beforeShow: function() {
					$('html').addClass('on-fancybox')
				},
				beforeClose: function() {
					$('html').removeClass('on-fancybox')
				}
			}
		});
	}

	PAGE.listener_tooltip = function() {
		if ($('.tooltip').length) {
			$('.tooltip').tooltipster({
				contentAsHTML: true
			});
		}
	};

	PAGE.laod = function () {
		PAGE.ideas_masonry();
	};

	PAGE.init = function () {
		$(window).load(PAGE.laod());
		
		PAGE.depoiments_home();
		PAGE.banner_accordion();
		PAGE.clamp();

		PAGE.ajax_more_diversity_request();
		PAGE.ajax_fancybox_request();

		PAGE.page_ideas_fancybox();
		
		PAGE.listener_contact_toast();
		PAGE.listener_menu();

		PAGE.listener_tooltip();

		PAGE.leia_mais();
	};

})(jQuery, document, window);

PAGE.init();
var YOUTUBE = YOUTUBE || {};

(function($, document, window) {

  YOUTUBE.list_videos = [];
  YOUTUBE.is_ready = false;
  YOUTUBE.current = null;
  YOUTUBE.doc_video = null;

  YOUTUBE.getYTPVideoID = function (url) {
    let videoID, playlistID;
    if (url.indexOf('youtu.be') > 0 || url.indexOf('youtube.com/embed') > 0) {
      videoID = url.substr(url.lastIndexOf('/') + 1, url.length);
      playlistID = videoID.indexOf('?list=') > 0 ? videoID.substr(videoID.lastIndexOf('='), videoID.length) : null;
      videoID = playlistID ? videoID.substr(0, videoID.lastIndexOf('?')) : videoID
    } else if (url.indexOf('http') > -1) {
      videoID = url.match(/[\\?&]v=([^&#]*)/)[1];
      playlistID = url.indexOf('list=') > 0 ? url.match(/[\\?&]list=([^&#]*)/)[1] : null
    } else {
      videoID = url.length > 15 ? null : url;
      playlistID = videoID ? null : url
    }
    return {
      videoID: videoID,
      playlistID: playlistID
    }
  };

  YOUTUBE.play_item = function() {
    if ($('#banner-home_accodrion').length) {
      let interval = 0;
      let interval_ready = setInterval(() => {
        try {
          let $container = $('#banner-home_accodrion').find('.banner-item.open');
          let index = parseInt($container.attr('data-count'));
          if (YOUTUBE.is_ready && YOUTUBE.list_videos[index] != undefined) {
            
            YOUTUBE.current = YOUTUBE.list_videos[index];
            YOUTUBE.current.playVideo();

            if (YOUTUBE.current.getPlayerState() == YT.PlayerState.PLAYING){
              clearInterval(interval_ready); 
            } else if (interval > 10) {
              YOUTUBE.current.playVideo();
            }
            interval++;
          }	
          if (interval > 20) {
            console.log('interval --->', interval);
            clearInterval(interval_ready); 
            YOUTUBE.play_item();
          }
        } catch (e) {
          console.log('e', e);
        }
      }, 1000);
    }
  }

  YOUTUBE.change_video = function(video_index) {
    console.log(video_index)
    if (YOUTUBE.current != null)
      YOUTUBE.current.pauseVideo();

    YOUTUBE.list_videos[video_index].playVideo();
    YOUTUBE.current = YOUTUBE.list_videos[video_index]
  }

  YOUTUBE.controls_listener = function() {
    if ($('#banner-home_accodrion').length) {
      $('.embed-responsive-item.embed-responsive-item_banner').on('click', function(e) {
        if ($(this).hasClass('ended'))
          return false;

        if ($(this).hasClass('playing')) {
          $(this).closest('.video').addClass('visibled');
          YOUTUBE.current.pauseVideo();
        } else {  
          $(this).closest('.video').removeClass('visibled');
          YOUTUBE.current.playVideo();
        }
      });
    }
  }

  YOUTUBE.loop = function() {
    if ($('#banner-home_accodrion').length) {
      try {
        $('.banner-item').each(function() {
          let _index = parseInt($(this).attr('data-count'));
          let _target = $(this).find('.youtube-embed').attr('id');
          let YTurl = $(this).find('.youtube-embed').attr('data-youtube');
          if (YTurl.length){
            let videoID = YOUTUBE.getYTPVideoID(YTurl).videoID;
            let thumb = "http://img.youtube.com/vi/"+ videoID+"/0.jpg";
            
            YOUTUBE.list_videos[_index] = new YT.Player(_target, {
              height: '360',
              width: '640',
              videoId: videoID,
              playerVars: {
                'showinfo': 0,
                'rel': 0,
                'autoplay': 0,
                'controls': 0,
                'color': 'white',
                'enablejsapi': 1,
                'iv_load_policy': 3,
                'end': 65
              },
              events: {
                'onReady': function(event) {
                  let $container = $(event.target.h).closest('.video');
                  let thumb_url = "url("+thumb+")";
                  $container.find('.embed-responsive-item').css('background-image', thumb_url);
                  
                  YOUTUBE.is_ready = true;
                },
                'onStateChange': function(event) {
                  let $container = $(event.target.h).closest('.video');
                  switch (event.data) {
                    case YT.PlayerState.PAUSED:
                      $container.find('.embed-responsive-item').removeClass('playing').addClass('paused');
                    break;
                    case YT.PlayerState.PLAYING:
                      $container.find('.embed-responsive-item').removeClass('paused').addClass('playing');
                    break;
                    case YT.PlayerState.ENDED:
                      $container.addClass('ended')
                      $container.find('.embed-responsive-item').removeClass('paused').removeClass('playing').addClass('ended');
                    break;
                    case YT.PlayerState.UNSTARTED:
                      
                    break;
                    default:

                    break;
                  }
                }
              }
            });
          }
        });
      } catch (e) {
        YOUTUBE.init_script();
        setTimeout(() => {
          YOUTUBE.loop();
        }, 1000);
      }
    }
  };

  YOUTUBE.embed_documenntario = function() {
		if ($('#documentario-em-destaque').length) {
			let YTurl = $('#documentario-em-destaque').find('.youtube-embed').attr('data-youtube');
			try {
				let videoID = YOUTUBE.getYTPVideoID(YTurl).videoID;
        let thumb = "http://img.youtube.com/vi/"+ videoID+"/0.jpg";

				YOUTUBE.doc_video = new YT.Player('documentario-em-destaque_youtube', {
					height: '360',
					width: '640',
					videoId: videoID,
					playerVars: {
						'showinfo': 0,
						'rel': 0,
						'autoplay': 0,
						'controls': 1,
						'color': 'white',
						'enablejsapi': 1,
						'iv_load_policy': 3
					},
					events: {
						'onReady': function(event) {
							let $container = $(event.target.h).closest('.video');
							let thumb_url = "url("+thumb+")";
              if ($container.hasClass('no-thumb'))
							  $container.find('.embed-responsive-item').css('background-image', thumb_url);

              $container.find('.embed-responsive-item').removeClass('on-loading').addClass('on-ready')
						},
						'onStateChange': function(event) {
							let $container = $(event.target.h).closest('.video');
              console.log('123', event.data)
							switch (event.data) {
								case YT.PlayerState.PAUSED:
									$container.find('.embed-responsive-item').removeClass('playing').addClass('paused');
								break;
								case YT.PlayerState.PLAYING:
									$container.find('.embed-responsive-item').removeClass('paused').addClass('playing');
								break;
								case YT.PlayerState.ENDED:
									$container.find('.embed-responsive-item').removeClass('paused').removeClass('playing').addClass('ended');
								break;
								case YT.PlayerState.UNSTARTED:
                  
								break;
								default:

								break;
							}
						}
					}
				});
        $('.embed-responsive-item.embed-responsive-item_documentario').on('click', function() {
          if ($(this).hasClass('playing')){
            YOUTUBE.doc_video.pauseVideo();
          } else {
            YOUTUBE.doc_video.playVideo();
          }
        });
			} catch(e) {
        YOUTUBE.init_script();
        setTimeout(() => {
          YOUTUBE.embed_documenntario();
        }, 1000);
			}
		}
	}

  YOUTUBE.init_script = function () {
    var tag = document.createElement('script');
    tag.src = "https://www.youtube.com/player_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    if ($('#video-embed_container').hasClass('video-mobile')) {
      $('#video-embed_container').closest('.accordion-content').addClass('mobile');
    }
  }
  
  YOUTUBE.init = function() {
    YOUTUBE.loop();
    YOUTUBE.controls_listener();
    YOUTUBE.embed_documenntario();
  };

})(jQuery, document, window);

YOUTUBE.init();