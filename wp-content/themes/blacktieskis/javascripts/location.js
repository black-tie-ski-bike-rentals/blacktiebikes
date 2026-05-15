(function ($) {
	var map;
	var locationDatas = new Array(); //store all data of locations
	var resportDatas = new Array(); //store all data of locations
    var blacktieskis = (function () {

		function init() {
		   /*
			* add json to location datas
			*/
			locationDatas = loadLocation(locationJsons);
			resportDatas = loadResport(resportJsons);
			initLatLongLocation(locationDatas);
			console.log(locationDatas);
			console.log(resportDatas);
		}		

		/*
		* generate data json 2 variable
		*/
		function loadLocation(datas) {
			var location_item = new Array();
			if (typeof datas != 'undefined'){
				var alldatas = datas;
				for(var i=0; i < alldatas.length; i++){
					location_item[i] = alldatas[i];
				}
			}
			return location_item;
		}
		
		/*
		* generate data json 2 variable
		*/
		function loadResport(datas) {
			var resport_item = new Array();
			if (typeof datas != 'undefined'){
				var alldatas = datas;
				for(var i=0; i < alldatas.length; i++){
					resport_item[i] = alldatas[i];
				}
			}
			return resport_item;
		}

		/*
		* update latlong
		*/
		function initLatLongLocation(datas){

			var _num_request_url = [];

			for(var i=0; i < datas.length; i++){				

				//create markers
				var _html = createMarker(datas[i].latitude, datas[i].longitude, datas[i]);
				_num_request_url.push(_html);				
			}
			initMarkerLocation(_num_request_url);
		}		

		/*
		* create marker for all locations
		* @param content (string) is popup
		*/
		function createMarker(olat, olng, content) {

			var photo = content.imageURL;
			var directions = content.Address + '+' + content.City + '+' + content.State + '+' + content.Zip;
			directions = directions.replace(/\s+/g, '+');
			
			var _content  = '<div>';
			if( content.imageURL != undefined && content.imageURL != null && content.imageURL != '' )			
				_content += '<img src="'+content.imageURL+'">';
			_content += '<p>'+content.Name+'</p>';
			
			if( content.parentLocationURL != undefined && content.parentLocationURL != null )				
				_content += '<p><a class="link-directions" target="_blank" href="'+content.parentLocationURL+'">Visit Website</a></p>';
			
			if( content.CTALink != undefined && content.CTALink != null )				
				_content += '<p><a class="link-directions" target="_blank" href="'+content.CTALink+'">Book Now</a></p>';

			var html  = '<div class="acf-map">';
				html += '<div class="marker" data-lat="'+olat+'" data-lng="'+olng+'"><div class="content-popup">'+_content+'</div></div>';
				html += '</div>';

			return html;
		}
		
		/*
		* create all Marker Location
		*/
		function initMarkerLocation(datas) {

			//if( datas.length == locationDatas.length ){
				var _html = '';
				$(datas).each(function(index, element) {
					_html += element;
				});
				$('#map').html(_html);

				//render map
				render_map( $('#map') );
			//}
		}
		
		/*
		* Deletes all markers
		*/
		function deleteMarkers() {
			for (var i = 0; i < map.markers.length; i++) {
				map.markers[i].setMap(null);
			}
			map.markers = [];
		}
		
		function addActionListenner() {
			var $modLocationFilter = $('.state-nav');
			$modLocationFilter.on('click', function () {				
				filterLocation(this);
			});
			
			var $resportItem = $('.resport-item');
			$resportItem.on('click', function () {				
				goIndividualResport(this);
			});
		}
		
		/*
		 * find resport group by this state
		 */
		function filterLocation(object) {
			var stateID = $(object).attr('data-state-id');			
			//reset markers
			deleteMarkers();		
			//add new markers
			var resport_current_item = new Array();
			if ( resportDatas.length ){
				for(var i=0; i < resportDatas.length; i++){
					if ( resportDatas[i].locationID == stateID ){
						resport_current_item.push(resportDatas[i]);
					}					
				}
			}
			initLatLongLocation(resport_current_item);
		}
		
		/*
		 * go to individual resport
		 */
		function goIndividualResport(object) {
			var currentLat;
			var currentLng;
			var resportID = $(object).attr('data-resport-id');
			//get latlng of this resport
			$(resportDatas).each(function(index, element) {
			
				var lat2;
				var lng2;
				
				if( element.resportID == resportID ){
					currentLat = element.latitude;
					currentLng = element.longitude;
				}
			});
			
			if( currentLat!=undefined && currentLat!=null && currentLng!=undefined && currentLng!=null ){			
				/*
				* use normal panto google map
				*/
				var newlatlng = new google.maps.LatLng(currentLat, currentLng);
				map.panTo(newlatlng);
				
				//open popup
				$.each( map.markers, function( i, marker ){

					if( marker.position.lat() == currentLat ){

						google.maps.event.trigger( marker, 'click' );
						//hide popup
						$('.container-content-popup').parent().hide(); //close all popup before open
					}
				});
			}
		}

		/*
		*  render_map
		*
		*  This function will render a Google Map onto the selected jQuery element
		*
		*  @param	$el (jQuery element)
		*  @return	n/a
		*/
		function render_map( $el ) {

			// var
			var $markers = $el.find('.marker');

			// vars
			var args = {
				zoom		: 16,
				center		: new google.maps.LatLng(0, 0),
				mapTypeId	: google.maps.MapTypeId.ROADMAP
			};

			// create map
			map = new google.maps.Map( $el[0], args);

			// add a markers reference
			map.markers = [];

			// add markers
			$markers.each(function(){

				add_marker( $(this), map );

			});

			// center map
			center_map( map );

		}

	   /*
		*  add_marker
		*
		*  This function will add a marker to the selected Google Map
		*
		*  @param	$marker (jQuery element)
		*  @param	map (Google Map object)
		*  @return	n/a
		*/
		function add_marker( $marker, map ) {

			// var
			var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
			var address = $marker.attr('data-address');

			//icon
			var icon_marker = null;
			if( $marker.attr('data-icon') == 'user-marker' )
				icon_marker = 'icon.png';

			// create marker
			var marker = new google.maps.Marker({
				position	: latlng,
				map			: map,
				icon		: icon_marker,
				/*icon: {
				   path: google.maps.SymbolPath.CIRCLE,
						scale: 10,
						fillColor: "#e51937",
						fillOpacity: 0.8,
						strokeColor: "#e51937",
						strokeWeight: 1,
				},*/				
				address: address
			});

			// add to array
			map.markers.push( marker );

			// if marker contains HTML, add it to an infoWindow
			if( $marker.html() )
			{
				// create info window
				var infowindow = new google.maps.InfoWindow({
					content		: $marker.html()
					//pixelOffset: new google.maps.Size(0, 12) //Positive y-offset values send the InfoWindow down
				});

				// show info window when marker is clicked
				google.maps.event.addListener(marker, 'click', function() {

					$('.container-content-popup').parent().hide(); //close all popup before open
					infowindow.open( map, marker );

					//active select box with this address
					//$('#address').val(address);
					//$('select#address').selectpicker('refresh');

				});

				//close popup when click map
				google.maps.event.addListener(map, 'click', function() {
					infowindow.close();
				});

				// style popup
				google.maps.event.addListener(infowindow, 'domready', function() {
					$('.gm-style-iw').prev().addClass('container-content-popup');
					var ccpup = $('.container-content-popup');
					for(var i=0; i < ccpup.length; i++){
						$(ccpup[i]).find('div').each(function(index, element) {
							$(this).addClass('item-popup-'+index);
						});
					}
				});

			}

		}

		/*
		*  center_map
		*
		*  This function will center the map, showing all markers attached to this map
		*
		*  @param	map (Google Map object)
		*  @return	n/a
		*/
		function center_map( map ) {

			// vars
			var bounds = new google.maps.LatLngBounds();

			// loop through all markers and create bounds
			$.each( map.markers, function( i, marker ){

				var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

				bounds.extend( latlng );

			});

			// only 1 marker?
			if( map.markers.length == 1 )
			{
				// set center of map
				map.setCenter( bounds.getCenter() );
				map.setZoom( 20 );
			}
			else
			{
				// fit to bounds
				map.fitBounds( bounds );
			}
		}			

        return {
            init: init,
            addActionListenner: addActionListenner
        }
    })
    ();
    $(document).ready(function () {
		blacktieskis.init();
		blacktieskis.addActionListenner();
    });
})(jQuery);
