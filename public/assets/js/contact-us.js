
jQuery(document).ready(function( $ ) {

	// global var
	var Body = $( 'body' );
	var BodyForm = 'form';
	var ContactUs = $( '#contact-us' );
	var Loader = 'div.loading-btn';
	var Submit = 'input[type="submit"]';
	var StayInTouch = $( 'div.stay-in-touch' );
	var Description = 'p.Descriptionription-text';
	var HasErrorClass = 'has-error';
	var ErrorClass = 'error';
	var Success = 'div.alert-success';
	var AlertDanger = 'div.alert-danger';
	var DisabledAttr = 'disabled';
	var BgColor = 'backgroundColor';
	var Span = 'span';
	// get button color
	var color = '';
	var hexc = function ( colorval ) {
    var parts = colorval.match( /^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/ );
    delete( parts[0] );
    for ( var i = 1; i <= 3; ++i ) {
        parts[i] = parseInt( parts[i] ).toString( 16 );
        if ( parts[i].length == 1 ) parts[i] = '0' + parts[i];
    }
    color = '#' + parts.join( '' );
	};

	// contact-us
	ContactUs.validate({
			errorClass: HasErrorClass,
			errorElement: Span,
			rules: {
				contact_name: {
					required: true
				},
				contact_email: {
					required: true,
					email: true
				},
				contact_phone: {
					required: true,
					digits: true
				}
			},
			errorPlacement: function( error, element ) {
				ContactUs.next( Success ).hide();
        error.appendTo( element.parent() );
      },
		  submitHandler: function( form ) {
		  	$( form ).find( Loader ).show();
		  	$( form ).find( Submit ).attr( DisabledAttr, DisabledAttr );

		  	var get_color = $( Submit ).css( BgColor );
        hexc( get_color );

		  	$.ajax({
		  		url: 'contact-mail.php',
		  		type: 'post',
		  		dataType: 'json',
		  		data: {
		  			name:  $( 'input[name="contact_name"]' ).val(),
		  			email:  $( 'input[name="contact_email"]' ).val(),
		  			phone:  $( 'input[name="contact_phone"]' ).val(),
		  			message:  $( 'textarea[name="contact_message"]' ).val(),
		  			pageurl: document.URL,
		  			color:  color
		  		},
		  		success: function( data ) {
		  			if( data.result == 1 ) {
		  			$( form )[0].reset();
		  			$( form ).next( Success ).slideDown();
		  			$( form ).find( Loader ).hide();
		  			$ (form ).find( Submit ).removeAttr( DisabledAttr );
				        setTimeout( function() {
									 $( form ).next( Success ).slideUp();
							}, 5000 );
		  			}
		  		},
		  		error: function() {

		  		}
		  	});
		  }
		});
	//end

	// stay in touch
	$( '#stayintouch' ).validate({
			errorClass: HasErrorClass,
			errorElement: Span,
			rules: {
				stay_name: {
					required: true
				},
				stay_email: {
					required: true,
					email: true
				},
				stay_phone: {
					required: true,
					digits: true
				}
			},
			errorPlacement: function( error, element ) {
        error.appendTo( element.parent() );
      },
		  submitHandler: function( form ) {
		  	$( form ).find( Loader ).show();
		  	$( form ).find( Submit ).attr( DisabledAttr,DisabledAttr );

		  	var get_color = $( Submit ).css( BgColor );
        hexc( get_color );

		  	$.ajax({
		  		url: 'contact-mail.php',
		  		type: 'post',
		  		dataType: 'json',
		  		data: {
		  			name:  $( 'input[name="stay_name"]' ).val(),
		  			email:  $(  'input[name="stay_email"]' ).val(),
		  			phone:  $('input[name="stay_phone"]' ).val(),
		  			message:  $( 'textarea[name="stay_message"]' ).val(),
		  			pageurl: document.URL,
		  			color:  color
		  		},
		  		success: function( data ) {
		  			if( data.result == 1 ) {
		  				$( form ).find( Loader ).hide();
		  				StayInTouch.find( Description ).show();
		  				$( form ).hide();
		  				$( form )[0].reset();
		  				$( form ).find( Submit ).removeAttr( DisabledAttr );
		  			}
		  		},
		  		error: function() {

		  		}
		  	});
		  }
		});
	//end

// newsletter
	$( '#subscribe' ).validate({
			errorClass: ErrorClass,
			errorElement: Span,
			rules: {
				email: {
					required: true,
					email: true
				},
			},
			onkeyup: function( element ) {
	      $( element ).valid();
	      if( $(element).hasClass( 'valid' ) ) {
	        Body.find( AlertDanger ).slideUp();
	      }
    	},
    	onfocusout: function ( element)  {
    		Body.find( AlertDanger ).slideUp();
    	},
			errorPlacement: function( error, element ) {
        var get_error = element.hasClass( ErrorClass );
        if( get_error ) {
        	 Body.find( AlertDanger ).text( error.text() ).slideDown();

        } else {
        	 Body.find( AlertDanger ).hide();
        }
      },
		  submitHandler: function( form ) {
		  	$( form ).find( Loader ).show();
		  	$( form ).find( Submit ).attr( DisabledAttr, DisabledAttr );

		  	var get_color = $( Submit ).css( BgColor );
        hexc( get_color );

		  	Body.find( AlertDanger ).hide();
		  	$.ajax({
		  		url: 'newsletter-mail.php',
		  		type: 'post',
		  		dataType: 'json',
		  		data: {
		  			email:  $( 'input[name="email"]' ).val(),
		  			pageurl: document.URL,
		  			color:  color
		  		},
		  		success: function( data ) {
		  			if( data.result == 1 ) {
		  				$( form )[0].reset();
		  				$( form ).find( Loader ).hide();
		  				$( form ).find( Submit ).removeAttr( DisabledAttr );
		  				Body.find( Success ).slideDown();
		  				setTimeout( function() {
									 Body.find( Success ).slideUp();
							}, 5000 );
		  			}
		  		},
		  		error: function() {

		  		}
		  	});
		  },
		  messages:  {
		  	email:  {
		  			required: "We need your email address to contact you.",
		  			email: "Oops, that doesn't look like an email address.",
		  	}
		  }
		});
	//end

	//
	StayInTouch.on( 'click', 'a', function() {
		setTimeout( function() {
			StayInTouch.find( Description ).hide();
			StayInTouch.find( BodyForm )[0].reset();
			StayInTouch.find( BodyForm + ' input' ).removeClass( HasErrorClass );
			StayInTouch.find( BodyForm ).show();
		}, 500 );
	});
	//end

	// header menu click afer form clear
	$( '.navbar, .logo' ).on( 'click', 'a', function() {
		Body.find( BodyForm + ' input' ).not( ':button, :submit, :hidden' ).removeClass( HasErrorClass + ' ' + ErrorClass ).val('');
		Body.find( 'div.alert' ).hide();
	});
	//end
});