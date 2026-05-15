<?php
/**
 * Displays content for Steps 1-5 Section
 */ 
?>
<section id="how-it-works" class="module mod-steps container">
  <div class="mod-steps-items">
	<?php		
	$num_items = count( get_sub_field('items') );
	if ( have_rows('items') ) :
	
		$enumerate = 0;			
		?><div class="row"><?php
			while ( have_rows('items') ): the_row();				
				
				if( $enumerate%2 != 0 ){
					$col_left_right = 'col-right';				
					$text_left_right = 'text-lg-left';				
				}else{
					$col_left_right = 'col-left';
					$text_left_right = 'text-lg-right';
				}
				$enumerate += 1;
				$photo = get_sub_field('photo');
				?><div class="step-item <?php echo $col_left_right; ?> col-12 col-lg-6 text-center <?php echo $text_left_right; ?> h-100 animation animation<?php echo $enumerate; ?>">
					<div class="box-step ani<?php echo $enumerate; ?>">
						<div class="step-number d-flex align-items-center justify-content-center">
						  <p>0<?php echo $enumerate; ?></p>
						</div>
						<?php
						if( !empty($photo) ) :
							?><div class="step-item-image position-relative">
							  <img data-src="<?php echo $photo['url']; ?>" class="rounded-circle" alt="<?php echo $photo['alt']; ?>">
							  <?php
							  if( $enumerate == $num_items ) :
							  ?><div class="step-item-image-cont text-center">
									<?php the_sub_field('content'); ?>
								  </div><?php
							  endif;?>
							</div><?php
						endif;						
						if( $enumerate != $num_items ) :
							?><div class="step-item-content col-lg-offset-4">
							  <?php	the_sub_field('content'); ?>
							</div><?php
						endif;?>
					</div>
				</div><?php																			
			endwhile;
			
			if( $enumerate > 0 ) :
			?><div class="line-svg line">
				<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 227.5 202.8" width="227.5" height="252.8">

<g transform="translate(0.000000,322.000000) scale(0.100000,-0.100000)"
fill="#490000" stroke="none">
<path d="M259 3083 c-13 -34 -8 -57 12 -61 23 -4 46 53 29 73 -18 22 -29 19
-41 -12z"/>
<path d="M321 3032 c-13 -25 -14 -69 -2 -77 6 -3 18 11 27 30 15 33 15 38 1
52 -14 14 -16 13 -26 -5z"/>
<path d="M150 3016 c0 -8 5 -18 10 -21 6 -3 10 -15 10 -26 0 -28 24 -18 28 11
3 15 -3 29 -14 37 -23 17 -34 16 -34 -1z"/>
<path d="M222 2998 c2 -18 11 -24 36 -26 41 -4 41 12 0 32 -40 20 -40 20 -36
-6z"/>
<path d="M88 2992 c-22 -4 -23 -25 -4 -41 19 -16 68 -3 64 17 -3 17 -35 30
-60 24z"/>
<path d="M372 2960 c-6 -11 -12 -31 -12 -45 0 -34 31 -33 48 2 10 23 10 30 -6
45 -17 17 -18 17 -30 -2z"/>
<path d="M210 2952 c0 -18 26 -62 35 -59 15 5 18 36 5 52 -13 16 -40 20 -40 7z"/>
<path d="M280 2931 c0 -17 18 -31 41 -31 15 0 10 22 -8 36 -25 18 -33 17 -33
-5z"/>
<path d="M143 2919 c-20 -20 -4 -40 26 -33 27 7 48 21 40 28 -12 12 -55 16
-66 5z"/>
<path d="M420 2891 c-12 -23 -14 -71 -2 -71 13 0 41 60 36 75 -8 21 -21 19
-34 -4z"/>
<path d="M277 2853 c7 -46 11 -52 24 -33 14 23 6 64 -13 68 -14 3 -16 -3 -11
-35z"/>
<path d="M326 2871 c-11 -17 20 -44 42 -37 29 10 28 24 -4 36 -31 12 -32 12
-38 1z"/>
<path d="M194 2845 c-4 -8 -1 -22 6 -30 15 -19 60 1 60 27 0 23 -58 26 -66 3z"/>
<path d="M460 2814 c-22 -56 3 -76 35 -28 13 20 14 28 4 40 -17 21 -28 17 -39
-12z"/>
<path d="M315 2811 c-3 -5 -1 -12 5 -16 5 -3 10 -15 10 -26 0 -25 17 -24 25 1
10 31 -24 66 -40 41z"/>
<path d="M373 2804 c-7 -20 22 -45 43 -37 20 8 17 19 -11 37 -24 16 -26 16
-32 0z"/>
<path d="M244 2775 c-3 -8 -3 -18 0 -24 8 -13 66 10 66 26 0 18 -59 17 -66 -2z"/>
<path d="M511 2766 c-7 -8 -11 -30 -9 -48 l4 -33 19 38 c13 25 16 40 8 48 -7
7 -14 5 -22 -5z"/>
<path d="M367 2718 c7 -40 9 -42 22 -33 6 3 11 19 11 36 0 22 -5 29 -20 29
-17 0 -19 -5 -13 -32z"/>
<path d="M420 2731 c0 -25 30 -36 49 -17 13 13 11 16 -13 26 -36 13 -36 13
-36 -9z"/>
<path d="M290 2701 c0 -11 5 -23 10 -26 18 -11 50 6 50 26 0 14 -7 19 -30 19
-23 0 -30 -5 -30 -19z"/>
<path d="M552 2698 c-14 -14 -16 -68 -2 -68 15 0 43 48 36 65 -7 18 -18 19
-34 3z"/>
<path d="M414 2668 c3 -13 6 -29 6 -36 0 -7 5 -10 10 -7 17 11 12 65 -6 65
-12 0 -15 -6 -10 -22z"/>
<path d="M462 2668 c2 -15 11 -24 26 -26 26 -4 29 15 5 34 -26 19 -35 17 -31
-8z"/>
<path d="M334 2645 c-10 -26 9 -38 40 -24 32 15 29 33 -7 37 -18 2 -29 -2 -33
-13z"/>
<path d="M590 2631 c-12 -23 -13 -61 -2 -61 11 0 43 61 36 71 -9 15 -23 10
-34 -10z"/>
<path d="M454 2595 c4 -47 13 -54 26 -20 7 20 7 31 -1 41 -19 23 -28 16 -25
-21z"/>
<path d="M504 2615 c-8 -21 4 -35 32 -35 31 0 31 22 -2 37 -20 9 -26 9 -30 -2z"/>
<path d="M386 2587 c-11 -8 -15 -19 -10 -30 7 -20 17 -21 45 -7 23 13 25 36 3
44 -20 8 -17 8 -38 -7z"/>
<path d="M629 2563 c-12 -32 -5 -55 14 -47 17 6 39 52 32 65 -12 18 -36 9 -46
-18z"/>
<path d="M494 2548 c3 -13 6 -29 6 -35 0 -21 18 -15 25 7 7 21 -9 50 -27 50
-6 0 -8 -10 -4 -22z"/>
<path d="M552 2548 c3 -25 38 -33 46 -10 2 6 -3 12 -12 12 -9 0 -16 5 -16 10
0 6 -5 10 -11 10 -6 0 -9 -10 -7 -22z"/>
<path d="M680 2521 c-13 -24 -13 -61 -1 -61 13 0 42 60 35 71 -9 15 -23 10
-34 -10z"/>
<path d="M422 2518 c-8 -8 -8 -15 -1 -24 12 -15 59 4 59 24 0 15 -42 16 -58 0z"/>
<path d="M536 2501 c-4 -5 -2 -12 3 -15 5 -3 7 -16 4 -27 -4 -16 -2 -20 8 -17
17 6 19 60 2 65 -6 2 -14 0 -17 -6z"/>
<path d="M590 2491 c0 -17 6 -21 30 -21 20 0 30 5 30 15 0 8 -6 15 -14 15 -8
0 -21 3 -30 6 -12 4 -16 0 -16 -15z"/>
<path d="M732 2478 c-17 -17 -15 -68 1 -68 17 0 38 45 31 65 -7 18 -16 19 -32
3z"/>
<path d="M470 2462 c-19 -15 -20 -20 -8 -30 17 -14 55 -5 62 14 3 7 -3 18 -13
24 -14 7 -25 5 -41 -8z"/>
<path d="M635 2450 c-3 -5 -2 -16 1 -25 7 -17 45 -17 51 0 4 13 -45 36 -52 25z"/>
<path d="M586 2423 c11 -45 21 -46 26 -3 2 17 -3 25 -15 28 -15 3 -17 -1 -11
-25z"/>
<path d="M774 2418 c-13 -29 -12 -50 1 -55 9 -3 35 49 35 70 0 17 -28 5 -36
-15z"/>
<path d="M518 2409 c-18 -10 -25 -39 -10 -39 18 0 62 26 59 35 -5 14 -29 16
-49 4z"/>
<path d="M629 2395 c-10 -10 3 -66 15 -62 14 5 15 59 0 64 -5 2 -13 1 -15 -2z"/>
<path d="M682 2384 c4 -22 26 -28 48 -15 18 12 13 17 -24 27 -24 6 -27 4 -24
-12z"/>
<path d="M826 2374 c-11 -28 -6 -54 9 -54 18 0 38 37 31 56 -7 19 -32 18 -40
-2z"/>
<path d="M552 2347 c-7 -8 -7 -18 -2 -27 7 -12 12 -12 34 0 14 7 26 19 26 27
0 17 -44 17 -58 0z"/>
<path d="M733 2344 c-8 -22 11 -37 36 -29 28 8 26 17 -5 32 -21 10 -26 9 -31
-3z"/>
<path d="M674 2324 c9 -36 14 -40 27 -27 16 16 7 47 -15 51 -16 3 -18 0 -12
-24z"/>
<path d="M876 2324 c-9 -24 -7 -54 4 -54 12 0 41 55 33 64 -12 11 -31 6 -37
-10z"/>
<path d="M600 2295 c-22 -27 3 -41 34 -19 14 11 26 22 26 27 0 13 -47 7 -60
-8z"/>
<path d="M786 2303 c-16 -16 -4 -33 23 -33 26 0 50 15 40 24 -10 8 -57 15 -63
9z"/>
<path d="M726 2273 c9 -36 12 -39 25 -26 16 16 7 47 -14 51 -15 3 -17 -1 -11
-25z"/>
<path d="M936 2284 c-20 -53 13 -75 38 -25 14 26 14 30 0 35 -24 9 -31 7 -38
-10z"/>
<path d="M643 2244 c-3 -8 -1 -20 4 -25 13 -13 63 9 63 28 0 19 -59 17 -67 -3z"/>
<path d="M837 2253 c-12 -18 11 -36 37 -29 27 7 36 26 12 26 -8 0 -21 3 -29 6
-8 3 -17 1 -20 -3z"/>
<path d="M990 2239 c-12 -21 -7 -49 8 -49 11 0 43 56 35 64 -13 12 -32 6 -43
-15z"/>
<path d="M770 2240 c0 -5 5 -10 10 -10 6 0 10 -7 10 -15 0 -8 4 -15 9 -15 12
0 23 29 15 41 -7 12 -44 11 -44 -1z"/>
<path d="M700 2202 c-19 -15 -20 -20 -7 -30 11 -10 17 -9 27 3 7 8 19 15 26
15 8 0 14 7 14 15 0 20 -33 19 -60 -3z"/>
<path d="M893 2204 c-3 -8 -3 -17 0 -20 9 -10 68 7 65 18 -6 17 -58 19 -65 2z"/>
<path d="M1052 2208 c-20 -20 -15 -58 8 -58 27 0 50 47 29 61 -19 12 -23 11
-37 -3z"/>
<path d="M826 2201 c-4 -5 -1 -13 5 -16 5 -4 8 -14 5 -22 -4 -10 0 -13 12 -11
23 4 23 52 0 56 -9 2 -19 -1 -22 -7z"/>
<path d="M950 2161 c0 -16 6 -21 24 -21 14 0 28 5 31 11 9 13 6 16 -28 24 -23
6 -27 4 -27 -14z"/>
<path d="M1117 2173 c-14 -13 -7 -63 8 -63 8 0 15 9 15 19 0 11 5 23 10 26 6
4 8 11 5 16 -7 11 -29 12 -38 2z"/>
<path d="M750 2155 c-10 -12 -10 -19 -1 -28 9 -9 18 -8 38 5 15 9 29 21 31 27
6 17 -54 13 -68 -4z"/>
<path d="M887 2164 c-3 -4 -3 -12 1 -18 4 -6 7 -15 7 -21 0 -5 7 -10 15 -10
20 0 20 49 0 53 -9 1 -19 0 -23 -4z"/>
<path d="M1010 2119 c0 -21 34 -26 60 -9 19 12 7 22 -30 25 -24 2 -30 -1 -30
-16z"/>
<path d="M1176 2124 c-11 -28 -6 -54 9 -54 18 0 49 45 40 60 -10 16 -42 12
-49 -6z"/>
<path d="M813 2118 c-24 -12 -29 -23 -14 -32 11 -7 71 22 71 35 0 12 -29 10
-57 -3z"/>
<path d="M945 2121 c-3 -5 -1 -12 4 -16 6 -3 8 -12 4 -20 -3 -9 1 -15 10 -15
21 0 33 40 16 51 -18 11 -26 11 -34 0z"/>
<path d="M1072 2083 c4 -20 35 -28 58 -14 18 12 13 17 -28 26 -29 6 -33 5 -30
-12z"/>
<path d="M1240 2081 c-14 -27 -13 -51 3 -51 14 0 48 55 39 64 -11 12 -32 5
-42 -13z"/>
<path d="M873 2078 c-27 -13 -30 -33 -7 -42 19 -7 64 21 64 40 0 16 -26 17
-57 2z"/>
<path d="M1004 2078 c3 -7 9 -21 12 -31 4 -10 12 -16 18 -14 17 6 20 38 4 48
-20 13 -40 11 -34 -3z"/>
<path d="M1312 2058 c-20 -20 -15 -58 8 -58 27 0 50 47 29 61 -19 12 -23 11
-37 -3z"/>
<path d="M1134 2048 c-4 -5 -1 -15 5 -21 12 -12 64 1 65 17 1 12 -63 16 -70 4z"/>
<path d="M933 2038 c-23 -11 -32 -38 -13 -38 19 0 79 34 74 42 -7 11 -34 9
-61 -4z"/>
<path d="M1064 2039 c-4 -7 -2 -15 4 -17 7 -2 12 -10 12 -19 0 -8 6 -13 13
-10 18 6 15 51 -5 55 -9 2 -20 -3 -24 -9z"/>
<path d="M1376 2014 c-10 -27 -7 -54 7 -54 16 0 40 47 32 61 -10 14 -32 11
-39 -7z"/>
<path d="M1195 2010 c-8 -12 10 -30 31 -30 5 0 19 7 30 15 14 11 15 14 4 15
-8 0 -25 3 -36 6 -12 3 -25 0 -29 -6z"/>
<path d="M992 1999 c-26 -10 -25 -32 2 -37 19 -4 66 23 66 38 0 12 -37 12 -68
-1z"/>
<path d="M1127 1995 c-4 -8 -2 -15 3 -15 6 0 10 -7 10 -16 0 -9 6 -14 13 -11
18 6 15 51 -4 55 -9 2 -19 -4 -22 -13z"/>
<path d="M1269 1979 c-17 -10 -1 -29 25 -29 12 0 31 6 41 14 17 12 16 14 -18
18 -21 2 -42 1 -48 -3z"/>
<path d="M1447 1983 c-4 -3 -7 -19 -7 -35 0 -37 32 -38 49 -1 10 21 9 28 -1
34 -16 11 -32 11 -41 2z"/>
<path d="M1063 1963 c-15 -6 -18 -33 -3 -33 16 0 60 23 60 32 0 9 -37 10 -57
1z"/>
<path d="M1190 1960 c0 -5 5 -10 11 -10 6 0 9 -7 6 -15 -9 -22 14 -30 29 -10
10 14 11 22 3 32 -13 15 -49 18 -49 3z"/>
<path d="M1516 1938 c-11 -15 -12 -26 -5 -40 13 -24 16 -23 34 12 18 36 18 37
0 44 -8 3 -21 -4 -29 -16z"/>
<path d="M1337 1943 c-12 -18 10 -34 37 -27 32 8 44 24 17 24 -10 0 -26 3 -34
6 -8 3 -17 1 -20 -3z"/>
<path d="M1260 1926 c0 -9 5 -16 10 -16 6 0 10 -7 10 -16 0 -9 6 -14 13 -12
15 5 23 48 9 48 -6 0 -17 3 -26 6 -11 4 -16 1 -16 -10z"/>
<path d="M1121 1917 c-28 -14 -29 -31 -2 -35 21 -3 71 24 71 39 0 13 -41 11
-69 -4z"/>
<path d="M1406 1905 c-3 -9 1 -18 8 -21 23 -9 59 0 64 15 3 10 -1 12 -15 9
-11 -3 -27 -2 -36 3 -10 6 -17 4 -21 -6z"/>
<path d="M1582 1895 c-17 -37 -3 -66 23 -47 28 20 37 42 25 57 -18 22 -35 18
-48 -10z"/>
<path d="M1213 1893 c-24 -5 -49 -30 -40 -39 8 -9 82 22 80 32 -2 11 -12 12
-40 7z"/>
<path d="M1330 1891 c0 -6 5 -13 10 -16 6 -4 8 -10 5 -15 -3 -5 0 -12 6 -16
15 -9 39 23 32 42 -6 15 -53 20 -53 5z"/>
<path d="M1476 1873 c-17 -17 -4 -33 29 -33 25 0 35 4 35 16 0 8 -4 12 -10 9
-5 -3 -18 -1 -28 4 -11 6 -22 7 -26 4z"/>
<path d="M1402 1858 c-7 -7 -3 -17 9 -29 26 -26 39 -24 39 5 0 26 -31 41 -48
24z"/>
<path d="M1652 1858 c-15 -15 -16 -45 -1 -54 14 -8 26 5 34 39 8 29 -10 38
-33 15z"/>
<path d="M1251 1843 c-22 -15 -23 -17 -7 -29 14 -10 23 -9 47 4 16 10 29 23
29 30 0 17 -41 15 -69 -5z"/>
<path d="M1546 1833 c-23 -24 13 -46 52 -32 27 10 30 33 3 26 -10 -2 -25 -1
-33 4 -8 5 -18 6 -22 2z"/>
<path d="M1722 1818 c-18 -18 -15 -58 4 -58 16 0 43 26 44 42 0 15 -37 27 -48
16z"/>
<path d="M1314 1806 c-15 -12 -16 -17 -7 -27 10 -10 20 -9 48 7 19 10 35 22
35 26 0 14 -55 9 -76 -6z"/>
<path d="M1465 1810 c-3 -5 -1 -10 4 -10 6 0 11 -9 11 -20 0 -11 6 -20 14 -20
16 0 31 34 21 50 -8 13 -42 13 -50 0z"/>
<path d="M1413 1783 c-31 -6 -49 -31 -35 -45 9 -9 21 -8 48 5 49 24 40 50 -13
40z"/>
<path d="M1606 1781 c-9 -14 31 -33 54 -26 22 7 27 25 8 25 -7 0 -23 3 -34 6
-12 3 -25 1 -28 -5z"/>
<path d="M1530 1770 c0 -5 5 -10 10 -10 6 0 10 -7 10 -15 0 -16 25 -21 34 -6
11 18 -6 41 -30 41 -13 0 -24 -4 -24 -10z"/>
<path d="M1780 1761 c-12 -24 -13 -48 -1 -55 10 -7 52 59 44 68 -12 12 -33 5
-43 -13z"/>
<path d="M1675 1740 c-10 -17 5 -30 35 -30 25 0 49 15 39 24 -12 10 -69 14
-74 6z"/>
<path d="M1444 1723 c-17 -17 -17 -18 3 -21 20 -3 83 22 83 33 0 13 -71 3 -86
-12z"/>
<path d="M1600 1731 c0 -5 4 -12 10 -16 5 -3 6 -13 3 -21 -4 -12 -1 -15 13
-12 29 5 26 52 -3 56 -13 2 -23 -1 -23 -7z"/>
<path d="M1841 1712 c-6 -10 -7 -28 -4 -40 4 -17 9 -20 23 -12 24 13 33 39 19
56 -15 19 -26 18 -38 -4z"/>
<path d="M1514 1685 c-19 -15 -19 -15 0 -30 17 -13 22 -12 47 2 16 10 29 23
29 30 0 18 -52 16 -76 -2z"/>
<path d="M1666 1684 c-3 -8 -2 -14 3 -14 5 0 11 -9 14 -20 3 -11 10 -20 15
-20 12 0 22 34 13 47 -11 18 -39 22 -45 7z"/>
<path d="M1737 1694 c-4 -4 -7 -11 -7 -16 0 -12 42 -27 58 -21 17 7 15 33 -2
33 -8 0 -21 2 -28 5 -8 3 -17 2 -21 -1z"/>
<path d="M1898 1656 c-11 -25 -6 -56 9 -56 4 0 15 13 24 29 12 21 14 32 6 40
-17 17 -26 13 -39 -13z"/>
<path d="M1604 1650 c-24 -10 -39 -28 -30 -37 10 -10 87 19 83 31 -5 15 -27
17 -53 6z"/>
<path d="M1737 1642 c-9 -14 5 -62 18 -62 12 0 25 21 25 40 0 13 -38 32 -43
22z"/>
<path d="M1800 1632 c0 -21 22 -31 53 -24 23 6 22 32 -2 32 -11 0 -26 3 -35 6
-11 4 -16 0 -16 -14z"/>
<path d="M1962 1608 c-19 -19 -15 -68 6 -68 23 0 46 49 31 67 -14 16 -22 16
-37 1z"/>
<path d="M1642 1594 c-16 -12 -16 -14 1 -31 16 -16 19 -16 45 -1 15 9 27 23
27 30 0 17 -50 19 -73 2z"/>
<path d="M1862 1592 c-9 -3 -9 -9 -2 -23 12 -21 60 -27 60 -6 0 14 -41 35 -58
29z"/>
<path d="M1795 1568 c10 -33 23 -44 36 -31 17 17 6 48 -20 51 -20 3 -22 1 -16
-20z"/>
<path d="M1735 1553 c-32 -8 -47 -24 -35 -38 8 -10 18 -9 45 4 53 25 46 48
-10 34z"/>
<path d="M2010 1541 c-14 -27 -13 -61 3 -61 15 0 41 56 32 70 -10 16 -23 12
-35 -9z"/>
<path d="M1855 1508 c9 -40 12 -45 26 -31 16 16 7 57 -14 61 -17 3 -18 -1 -12
-30z"/>
<path d="M1916 1532 c-3 -6 -3 -17 0 -26 8 -21 64 -22 64 -1 0 8 -8 15 -18 15
-10 0 -23 5 -29 11 -7 7 -13 7 -17 1z"/>
<path d="M1765 1485 c-17 -14 -18 -17 -3 -31 14 -14 18 -14 47 0 17 9 31 23
31 31 0 20 -49 19 -75 0z"/>
<path d="M2059 1463 c-5 -14 -8 -32 -5 -40 8 -21 36 -15 36 7 0 11 5 20 10 20
7 0 7 6 0 20 -15 27 -29 25 -41 -7z"/>
<path d="M1900 1466 c0 -15 21 -56 29 -56 13 0 22 27 15 45 -5 13 -44 22 -44
11z"/>
<path d="M1965 1461 c-7 -13 34 -41 51 -34 22 8 17 23 -12 33 -31 12 -31 12
-39 1z"/>
<path d="M1821 1431 c-8 -5 -11 -16 -8 -25 7 -18 23 -21 32 -6 3 6 15 10 26
10 10 0 19 7 19 15 0 17 -46 21 -69 6z"/>
<path d="M1955 1411 c-3 -6 -3 -17 2 -23 4 -7 6 -21 4 -32 -3 -22 18 -18 33 7
8 12 8 22 0 34 -13 21 -30 27 -39 14z"/>
<path d="M2106 1404 c-9 -24 -7 -64 3 -64 13 0 42 60 35 71 -9 14 -31 10 -38
-7z"/>
<path d="M2022 1389 c2 -18 10 -25 31 -27 31 -4 39 22 10 32 -10 3 -24 9 -31
12 -10 4 -13 -1 -10 -17z"/>
<path d="M1870 1365 c-18 -21 5 -48 34 -39 25 7 48 33 40 45 -9 15 -61 10 -74
-6z"/>
<path d="M2161 1346 c-7 -8 -15 -31 -18 -51 -4 -27 -3 -35 8 -33 32 7 49 56
30 86 -6 10 -10 10 -20 -2z"/>
<path d="M2007 1343 c-10 -15 5 -63 20 -63 10 0 13 9 11 32 -3 30 -21 48 -31
31z"/>
<path d="M2060 1320 c0 -24 37 -47 53 -31 8 8 5 17 -11 31 -27 25 -42 25 -42
0z"/>
<path d="M1932 1309 c-24 -9 -26 -16 -12 -39 7 -12 12 -12 22 -2 6 6 20 12 30
12 23 0 23 26 0 32 -10 3 -28 1 -40 -3z"/>
<path d="M2053 1240 c2 -48 17 -56 30 -17 6 19 5 32 -3 42 -21 25 -30 17 -27
-25z"/>
<path d="M2104 1255 c-8 -20 13 -45 37 -45 26 0 23 22 -6 43 -22 16 -26 16
-31 2z"/>
<path d="M2190 1251 c-12 -24 -13 -58 -2 -65 11 -7 40 55 35 72 -7 18 -21 15
-33 -7z"/>
<path d="M1978 1239 c-37 -21 -11 -65 28 -47 28 13 39 38 22 50 -17 10 -29 10
-50 -3z"/>
<path d="M2096 1163 c10 -59 25 -60 27 -2 2 25 -3 34 -16 37 -16 3 -17 -1 -11
-35z"/>
<path d="M2152 1169 c3 -23 33 -48 44 -37 7 7 -27 57 -39 58 -5 0 -7 -10 -5
-21z"/>
<path d="M2226 1174 c-9 -24 -7 -74 3 -74 5 0 16 11 25 25 13 19 14 30 6 45
-13 24 -26 26 -34 4z"/>
<path d="M2006 1162 c-3 -5 -3 -18 1 -30 4 -16 9 -19 22 -12 9 5 24 11 34 14
32 10 20 36 -17 36 -19 0 -37 -4 -40 -8z"/>
<path d="M2132 1085 c0 -31 4 -45 11 -42 7 2 12 21 12 42 0 21 -5 40 -12 42
-7 3 -11 -11 -11 -42z"/>
<path d="M2180 1086 c0 -26 24 -51 40 -41 15 9 12 23 -10 45 -26 26 -30 25
-30 -4z"/>
<path d="M2260 1090 c-6 -12 -10 -35 -8 -53 l3 -32 22 38 c21 35 22 67 2 67
-4 0 -13 -9 -19 -20z"/>
<path d="M2054 1086 c-17 -13 -12 -56 7 -56 22 0 49 22 49 39 0 23 -33 33 -56
17z"/>
<path d="M2164 1003 c1 -21 6 -39 11 -40 14 -4 12 70 -2 74 -7 3 -10 -9 -9
-34z"/>
<path d="M2212 993 c2 -20 9 -29 26 -31 26 -4 28 10 5 38 -24 28 -35 25 -31
-7z"/>
<path d="M2291 1001 c-13 -24 -14 -68 -2 -75 10 -6 31 37 31 64 0 27 -17 34
-29 11z"/>
<path d="M2082 998 c-6 -8 -8 -19 -4 -26 10 -16 67 0 67 19 0 18 -49 24 -63 7z"/>
<path d="M2193 910 c0 -45 13 -52 27 -15 11 28 4 55 -15 55 -8 0 -12 -15 -12
-40z"/>
<path d="M2244 925 c-9 -21 7 -49 30 -53 22 -5 20 14 -4 45 -18 23 -20 23 -26
8z"/>
<path d="M2115 920 c-11 -17 6 -62 22 -56 8 3 18 6 23 6 16 0 23 42 9 51 -19
12 -46 11 -54 -1z"/>
<path d="M2321 916 c-7 -8 -11 -32 -9 -53 l3 -38 18 39 c19 43 11 80 -12 52z"/>
<path d="M2229 870 c0 -3 -2 -24 -4 -48 -4 -49 13 -53 28 -8 7 22 6 32 -7 44
-9 9 -16 14 -17 12z"/>
<path d="M2277 843 c-14 -14 -6 -53 13 -63 16 -8 20 -8 20 4 0 21 -26 67 -33
59z"/>
<path d="M2147 833 c-4 -3 -7 -17 -7 -31 0 -19 4 -23 18 -17 9 4 24 8 31 9 21
4 26 27 10 37 -17 10 -43 12 -52 2z"/>
<path d="M2352 827 c-19 -22 -29 -91 -13 -86 25 9 45 56 35 79 -9 19 -11 20
-22 7z"/>
<path d="M2250 755 c0 -17 -3 -41 -7 -54 -10 -38 20 -21 31 18 7 25 6 36 -7
49 -16 15 -17 14 -17 -13z"/>
<path d="M2172 737 c-15 -18 -3 -60 15 -53 8 3 19 6 23 6 5 0 14 10 21 21 9
17 8 23 -2 30 -20 13 -45 11 -57 -4z"/>
<path d="M2294 735 c-8 -19 5 -46 24 -53 22 -7 24 27 3 49 -19 21 -21 21 -27
4z"/>
<path d="M2364 713 c-3 -16 -7 -33 -9 -40 -2 -7 0 -15 5 -18 12 -7 40 53 33
71 -8 23 -22 16 -29 -13z"/>
<path d="M2272 635 c0 -48 14 -61 24 -21 7 31 2 58 -12 63 -7 2 -11 -14 -12
-42z"/>
<path d="M2195 640 c-9 -28 0 -38 30 -32 32 6 40 19 25 37 -18 21 -48 18 -55
-5z"/>
<path d="M2320 630 c0 -16 2 -30 4 -30 2 0 11 -3 20 -6 12 -4 16 0 16 15 0 12
-4 21 -10 21 -5 0 -10 7 -10 15 0 8 -4 15 -10 15 -5 0 -10 -13 -10 -30z"/>
<path d="M2392 633 c-16 -30 -16 -86 1 -81 20 7 32 54 20 80 l-10 23 -11 -22z"/>
<path d="M2300 588 c-7 -35 -7 -98 0 -98 13 0 32 64 24 83 -5 14 -23 24 -24
15z"/>
<path d="M2344 545 c-7 -29 16 -62 35 -51 14 9 14 36 1 36 -5 0 -10 6 -10 14
0 27 -19 27 -26 1z"/>
<path d="M2221 546 c-7 -8 -10 -24 -6 -36 11 -35 69 -7 62 30 -3 20 -41 24
-56 6z"/>
<path d="M2410 515 c-19 -58 -8 -76 18 -31 22 37 23 66 3 66 -5 0 -15 -16 -21
-35z"/>
<path d="M2318 450 c-4 -49 8 -62 22 -24 12 32 10 56 -6 61 -7 2 -13 -12 -16
-37z"/>
<path d="M2240 450 c-15 -28 -4 -41 28 -33 33 8 44 23 30 40 -16 19 -46 16
-58 -7z"/>
<path d="M2367 464 c-12 -13 -8 -51 8 -64 24 -20 44 4 23 27 -8 10 -17 24 -19
31 -3 7 -8 10 -12 6z"/>
<path d="M2452 457 c-17 -20 -27 -83 -14 -91 19 -11 43 41 34 75 -6 27 -9 29
-20 16z"/>
<path d="M2340 346 c0 -49 16 -62 26 -22 8 32 2 58 -13 64 -9 2 -13 -10 -13
-42z"/>
<path d="M2277 369 c-17 -10 -24 -54 -9 -62 15 -9 52 13 52 31 0 28 -21 43
-43 31z"/>
<path d="M2396 372 c-15 -14 -5 -51 15 -57 36 -12 46 11 16 39 -14 13 -28 21
-31 18z"/>
<path d="M2466 344 c-9 -23 -7 -64 3 -64 12 0 34 57 26 69 -9 16 -22 13 -29
-5z"/>
<path d="M2379 309 c0 -2 -2 -26 -5 -53 -3 -43 -1 -48 11 -35 23 23 28 64 11
78 -9 8 -16 12 -17 10z"/>
<path d="M2425 270 c-7 -23 9 -50 31 -50 25 0 26 21 1 46 -25 25 -25 25 -32 4z"/>
<path d="M2284 255 c-8 -33 -4 -37 34 -29 54 11 50 53 -5 54 -16 0 -25 -8 -29
-25z"/>
</g>
</svg>


			</div><?php
			endif;
			
			if( $enumerate > 1 ) :
			 ?>
			 <div class="line-svg2 line">
				<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 240.8 370.7" width="240.8" height="370.7" >
  <defs>
    <style>
     /***************************************************
 * Generated by SVG Artista on 5/21/2022, 12:09:41 PM
 * MIT license (https://opensource.org/licenses/MIT)
 * W. https://svgartista.net
 **************************************************/

@-webkit-keyframes animate-svg-fill-1 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-1 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-1 {
  -webkit-animation: animate-svg-fill-1 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.1s both;
          animation: animate-svg-fill-1 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.1s both;
}

@-webkit-keyframes animate-svg-fill-2 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-2 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-2 {
  -webkit-animation: animate-svg-fill-2 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.101s both;
          animation: animate-svg-fill-2 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.101s both;
}

@-webkit-keyframes animate-svg-fill-3 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-3 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-3 {
  -webkit-animation: animate-svg-fill-3 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.10200000000000001s both;
          animation: animate-svg-fill-3 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.10200000000000001s both;
}

@-webkit-keyframes animate-svg-fill-4 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-4 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-4 {
  -webkit-animation: animate-svg-fill-4 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.10300000000000001s both;
          animation: animate-svg-fill-4 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.10300000000000001s both;
}

@-webkit-keyframes animate-svg-fill-5 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-5 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-5 {
  -webkit-animation: animate-svg-fill-5 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.10400000000000001s both;
          animation: animate-svg-fill-5 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.10400000000000001s both;
}

@-webkit-keyframes animate-svg-fill-6 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-6 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-6 {
  -webkit-animation: animate-svg-fill-6 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.10500000000000001s both;
          animation: animate-svg-fill-6 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.10500000000000001s both;
}

@-webkit-keyframes animate-svg-fill-7 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-7 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-7 {
  -webkit-animation: animate-svg-fill-7 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.10600000000000001s both;
          animation: animate-svg-fill-7 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.10600000000000001s both;
}

@-webkit-keyframes animate-svg-fill-8 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-8 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-8 {
  -webkit-animation: animate-svg-fill-8 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.10700000000000001s both;
          animation: animate-svg-fill-8 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.10700000000000001s both;
}

@-webkit-keyframes animate-svg-fill-9 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-9 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-9 {
  -webkit-animation: animate-svg-fill-9 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.10800000000000001s both;
          animation: animate-svg-fill-9 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.10800000000000001s both;
}

@-webkit-keyframes animate-svg-fill-10 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-10 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-10 {
  -webkit-animation: animate-svg-fill-10 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.10900000000000001s both;
          animation: animate-svg-fill-10 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.10900000000000001s both;
}

@-webkit-keyframes animate-svg-fill-11 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-11 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-11 {
  -webkit-animation: animate-svg-fill-11 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.11s both;
          animation: animate-svg-fill-11 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.11s both;
}

@-webkit-keyframes animate-svg-fill-12 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-12 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-12 {
  -webkit-animation: animate-svg-fill-12 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.111s both;
          animation: animate-svg-fill-12 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.111s both;
}

@-webkit-keyframes animate-svg-fill-13 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-13 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-13 {
  -webkit-animation: animate-svg-fill-13 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.112s both;
          animation: animate-svg-fill-13 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.112s both;
}

@-webkit-keyframes animate-svg-fill-14 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-14 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-14 {
  -webkit-animation: animate-svg-fill-14 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.113s both;
          animation: animate-svg-fill-14 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.113s both;
}

@-webkit-keyframes animate-svg-fill-15 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-15 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-15 {
  -webkit-animation: animate-svg-fill-15 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.114s both;
          animation: animate-svg-fill-15 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.114s both;
}

@-webkit-keyframes animate-svg-fill-16 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-16 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-16 {
  -webkit-animation: animate-svg-fill-16 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.115s both;
          animation: animate-svg-fill-16 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.115s both;
}

@-webkit-keyframes animate-svg-fill-17 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-17 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-17 {
  -webkit-animation: animate-svg-fill-17 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.116s both;
          animation: animate-svg-fill-17 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.116s both;
}

@-webkit-keyframes animate-svg-fill-18 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-18 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-18 {
  -webkit-animation: animate-svg-fill-18 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.117s both;
          animation: animate-svg-fill-18 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.117s both;
}

@-webkit-keyframes animate-svg-fill-19 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-19 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-19 {
  -webkit-animation: animate-svg-fill-19 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.11800000000000001s both;
          animation: animate-svg-fill-19 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.11800000000000001s both;
}

@-webkit-keyframes animate-svg-fill-20 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-20 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-20 {
  -webkit-animation: animate-svg-fill-20 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.11900000000000001s both;
          animation: animate-svg-fill-20 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.11900000000000001s both;
}

@-webkit-keyframes animate-svg-fill-21 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-21 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-21 {
  -webkit-animation: animate-svg-fill-21 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.12000000000000001s both;
          animation: animate-svg-fill-21 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.12000000000000001s both;
}

@-webkit-keyframes animate-svg-fill-22 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-22 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-22 {
  -webkit-animation: animate-svg-fill-22 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.12100000000000001s both;
          animation: animate-svg-fill-22 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.12100000000000001s both;
}

@-webkit-keyframes animate-svg-fill-23 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-23 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-23 {
  -webkit-animation: animate-svg-fill-23 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.122s both;
          animation: animate-svg-fill-23 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.122s both;
}

@-webkit-keyframes animate-svg-fill-24 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-24 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-24 {
  -webkit-animation: animate-svg-fill-24 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.123s both;
          animation: animate-svg-fill-24 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.123s both;
}

@-webkit-keyframes animate-svg-fill-25 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-25 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-25 {
  -webkit-animation: animate-svg-fill-25 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.124s both;
          animation: animate-svg-fill-25 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.124s both;
}

@-webkit-keyframes animate-svg-fill-26 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-26 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-26 {
  -webkit-animation: animate-svg-fill-26 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.125s both;
          animation: animate-svg-fill-26 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.125s both;
}

@-webkit-keyframes animate-svg-fill-27 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-27 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-27 {
  -webkit-animation: animate-svg-fill-27 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.126s both;
          animation: animate-svg-fill-27 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.126s both;
}

@-webkit-keyframes animate-svg-fill-28 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-28 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-28 {
  -webkit-animation: animate-svg-fill-28 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.127s both;
          animation: animate-svg-fill-28 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.127s both;
}

@-webkit-keyframes animate-svg-fill-29 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-29 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-29 {
  -webkit-animation: animate-svg-fill-29 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.128s both;
          animation: animate-svg-fill-29 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.128s both;
}

@-webkit-keyframes animate-svg-fill-30 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-30 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-30 {
  -webkit-animation: animate-svg-fill-30 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.129s both;
          animation: animate-svg-fill-30 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.129s both;
}

@-webkit-keyframes animate-svg-fill-31 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-31 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-31 {
  -webkit-animation: animate-svg-fill-31 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.13s both;
          animation: animate-svg-fill-31 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.13s both;
}

@-webkit-keyframes animate-svg-fill-32 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-32 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-32 {
  -webkit-animation: animate-svg-fill-32 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.131s both;
          animation: animate-svg-fill-32 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.131s both;
}

@-webkit-keyframes animate-svg-fill-33 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-33 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-33 {
  -webkit-animation: animate-svg-fill-33 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.132s both;
          animation: animate-svg-fill-33 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.132s both;
}

@-webkit-keyframes animate-svg-fill-34 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-34 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-34 {
  -webkit-animation: animate-svg-fill-34 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.133s both;
          animation: animate-svg-fill-34 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.133s both;
}

@-webkit-keyframes animate-svg-fill-35 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-35 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-35 {
  -webkit-animation: animate-svg-fill-35 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.134s both;
          animation: animate-svg-fill-35 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.134s both;
}

@-webkit-keyframes animate-svg-fill-36 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-36 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-36 {
  -webkit-animation: animate-svg-fill-36 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.135s both;
          animation: animate-svg-fill-36 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.135s both;
}

@-webkit-keyframes animate-svg-fill-37 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-37 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-37 {
  -webkit-animation: animate-svg-fill-37 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.136s both;
          animation: animate-svg-fill-37 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.136s both;
}

@-webkit-keyframes animate-svg-fill-38 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-38 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-38 {
  -webkit-animation: animate-svg-fill-38 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.137s both;
          animation: animate-svg-fill-38 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.137s both;
}

@-webkit-keyframes animate-svg-fill-39 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-39 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-39 {
  -webkit-animation: animate-svg-fill-39 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.138s both;
          animation: animate-svg-fill-39 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.138s both;
}

@-webkit-keyframes animate-svg-fill-40 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-40 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-40 {
  -webkit-animation: animate-svg-fill-40 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.139s both;
          animation: animate-svg-fill-40 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.139s both;
}

@-webkit-keyframes animate-svg-fill-41 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-41 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-41 {
  -webkit-animation: animate-svg-fill-41 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.14s both;
          animation: animate-svg-fill-41 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.14s both;
}

@-webkit-keyframes animate-svg-fill-42 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-42 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-42 {
  -webkit-animation: animate-svg-fill-42 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.14100000000000001s both;
          animation: animate-svg-fill-42 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.14100000000000001s both;
}

@-webkit-keyframes animate-svg-fill-43 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-43 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-43 {
  -webkit-animation: animate-svg-fill-43 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.14200000000000002s both;
          animation: animate-svg-fill-43 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.14200000000000002s both;
}

@-webkit-keyframes animate-svg-fill-44 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-44 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-44 {
  -webkit-animation: animate-svg-fill-44 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.14300000000000002s both;
          animation: animate-svg-fill-44 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.14300000000000002s both;
}

@-webkit-keyframes animate-svg-fill-45 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-45 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-45 {
  -webkit-animation: animate-svg-fill-45 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.14400000000000002s both;
          animation: animate-svg-fill-45 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.14400000000000002s both;
}

@-webkit-keyframes animate-svg-fill-46 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-46 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-46 {
  -webkit-animation: animate-svg-fill-46 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.14500000000000002s both;
          animation: animate-svg-fill-46 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.14500000000000002s both;
}

@-webkit-keyframes animate-svg-fill-47 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-47 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-47 {
  -webkit-animation: animate-svg-fill-47 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.14600000000000002s both;
          animation: animate-svg-fill-47 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.14600000000000002s both;
}

@-webkit-keyframes animate-svg-fill-48 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-48 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-48 {
  -webkit-animation: animate-svg-fill-48 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.14700000000000002s both;
          animation: animate-svg-fill-48 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.14700000000000002s both;
}

@-webkit-keyframes animate-svg-fill-49 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-49 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-49 {
  -webkit-animation: animate-svg-fill-49 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.14800000000000002s both;
          animation: animate-svg-fill-49 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.14800000000000002s both;
}

@-webkit-keyframes animate-svg-fill-50 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-50 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-50 {
  -webkit-animation: animate-svg-fill-50 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.14900000000000002s both;
          animation: animate-svg-fill-50 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.14900000000000002s both;
}

@-webkit-keyframes animate-svg-fill-51 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-51 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-51 {
  -webkit-animation: animate-svg-fill-51 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.15000000000000002s both;
          animation: animate-svg-fill-51 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.15000000000000002s both;
}

@-webkit-keyframes animate-svg-fill-52 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-52 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-52 {
  -webkit-animation: animate-svg-fill-52 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.15100000000000002s both;
          animation: animate-svg-fill-52 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.15100000000000002s both;
}

@-webkit-keyframes animate-svg-fill-53 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-53 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-53 {
  -webkit-animation: animate-svg-fill-53 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.15200000000000002s both;
          animation: animate-svg-fill-53 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.15200000000000002s both;
}

@-webkit-keyframes animate-svg-fill-54 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-54 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-54 {
  -webkit-animation: animate-svg-fill-54 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.153s both;
          animation: animate-svg-fill-54 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.153s both;
}

@-webkit-keyframes animate-svg-fill-55 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-55 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-55 {
  -webkit-animation: animate-svg-fill-55 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.154s both;
          animation: animate-svg-fill-55 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.154s both;
}

@-webkit-keyframes animate-svg-fill-56 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-56 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-56 {
  -webkit-animation: animate-svg-fill-56 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.155s both;
          animation: animate-svg-fill-56 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.155s both;
}

@-webkit-keyframes animate-svg-fill-57 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-57 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-57 {
  -webkit-animation: animate-svg-fill-57 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.156s both;
          animation: animate-svg-fill-57 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.156s both;
}

@-webkit-keyframes animate-svg-fill-58 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-58 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-58 {
  -webkit-animation: animate-svg-fill-58 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.157s both;
          animation: animate-svg-fill-58 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.157s both;
}

@-webkit-keyframes animate-svg-fill-59 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-59 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-59 {
  -webkit-animation: animate-svg-fill-59 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.158s both;
          animation: animate-svg-fill-59 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.158s both;
}

@-webkit-keyframes animate-svg-fill-60 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-60 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-60 {
  -webkit-animation: animate-svg-fill-60 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.159s both;
          animation: animate-svg-fill-60 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.159s both;
}

@-webkit-keyframes animate-svg-fill-61 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-61 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-61 {
  -webkit-animation: animate-svg-fill-61 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.16s both;
          animation: animate-svg-fill-61 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.16s both;
}

@-webkit-keyframes animate-svg-fill-62 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-62 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-62 {
  -webkit-animation: animate-svg-fill-62 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.161s both;
          animation: animate-svg-fill-62 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.161s both;
}

@-webkit-keyframes animate-svg-fill-63 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-63 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-63 {
  -webkit-animation: animate-svg-fill-63 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.162s both;
          animation: animate-svg-fill-63 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.162s both;
}

@-webkit-keyframes animate-svg-fill-64 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-64 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-64 {
  -webkit-animation: animate-svg-fill-64 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.163s both;
          animation: animate-svg-fill-64 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.163s both;
}

@-webkit-keyframes animate-svg-fill-65 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-65 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-65 {
  -webkit-animation: animate-svg-fill-65 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.164s both;
          animation: animate-svg-fill-65 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.164s both;
}

@-webkit-keyframes animate-svg-fill-66 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-66 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-66 {
  -webkit-animation: animate-svg-fill-66 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.165s both;
          animation: animate-svg-fill-66 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.165s both;
}

@-webkit-keyframes animate-svg-fill-67 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-67 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-67 {
  -webkit-animation: animate-svg-fill-67 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.166s both;
          animation: animate-svg-fill-67 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.166s both;
}

@-webkit-keyframes animate-svg-fill-68 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-68 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-68 {
  -webkit-animation: animate-svg-fill-68 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.167s both;
          animation: animate-svg-fill-68 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.167s both;
}

@-webkit-keyframes animate-svg-fill-69 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-69 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-69 {
  -webkit-animation: animate-svg-fill-69 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.168s both;
          animation: animate-svg-fill-69 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.168s both;
}

@-webkit-keyframes animate-svg-fill-70 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-70 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-70 {
  -webkit-animation: animate-svg-fill-70 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.169s both;
          animation: animate-svg-fill-70 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.169s both;
}

@-webkit-keyframes animate-svg-fill-71 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-71 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-71 {
  -webkit-animation: animate-svg-fill-71 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.17s both;
          animation: animate-svg-fill-71 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.17s both;
}

@-webkit-keyframes animate-svg-fill-72 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-72 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-72 {
  -webkit-animation: animate-svg-fill-72 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.171s both;
          animation: animate-svg-fill-72 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.171s both;
}

@-webkit-keyframes animate-svg-fill-73 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-73 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-73 {
  -webkit-animation: animate-svg-fill-73 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.17200000000000001s both;
          animation: animate-svg-fill-73 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.17200000000000001s both;
}

@-webkit-keyframes animate-svg-fill-74 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-74 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-74 {
  -webkit-animation: animate-svg-fill-74 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.173s both;
          animation: animate-svg-fill-74 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.173s both;
}

@-webkit-keyframes animate-svg-fill-75 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-75 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-75 {
  -webkit-animation: animate-svg-fill-75 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.174s both;
          animation: animate-svg-fill-75 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.174s both;
}

@-webkit-keyframes animate-svg-fill-76 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-76 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-76 {
  -webkit-animation: animate-svg-fill-76 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.175s both;
          animation: animate-svg-fill-76 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.175s both;
}

@-webkit-keyframes animate-svg-fill-77 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-77 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-77 {
  -webkit-animation: animate-svg-fill-77 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.176s both;
          animation: animate-svg-fill-77 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.176s both;
}

@-webkit-keyframes animate-svg-fill-78 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-78 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-78 {
  -webkit-animation: animate-svg-fill-78 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.177s both;
          animation: animate-svg-fill-78 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.177s both;
}

@-webkit-keyframes animate-svg-fill-79 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-79 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-79 {
  -webkit-animation: animate-svg-fill-79 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.178s both;
          animation: animate-svg-fill-79 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.178s both;
}

@-webkit-keyframes animate-svg-fill-80 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-80 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-80 {
  -webkit-animation: animate-svg-fill-80 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.179s both;
          animation: animate-svg-fill-80 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.179s both;
}

@-webkit-keyframes animate-svg-fill-81 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-81 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-81 {
  -webkit-animation: animate-svg-fill-81 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.18s both;
          animation: animate-svg-fill-81 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.18s both;
}

@-webkit-keyframes animate-svg-fill-82 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-82 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-82 {
  -webkit-animation: animate-svg-fill-82 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.181s both;
          animation: animate-svg-fill-82 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.181s both;
}

@-webkit-keyframes animate-svg-fill-83 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-83 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-83 {
  -webkit-animation: animate-svg-fill-83 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.182s both;
          animation: animate-svg-fill-83 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.182s both;
}

@-webkit-keyframes animate-svg-fill-84 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-84 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-84 {
  -webkit-animation: animate-svg-fill-84 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.183s both;
          animation: animate-svg-fill-84 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.183s both;
}

@-webkit-keyframes animate-svg-fill-85 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-85 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-85 {
  -webkit-animation: animate-svg-fill-85 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.184s both;
          animation: animate-svg-fill-85 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.184s both;
}

@-webkit-keyframes animate-svg-fill-86 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-86 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-86 {
  -webkit-animation: animate-svg-fill-86 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.185s both;
          animation: animate-svg-fill-86 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.185s both;
}

@-webkit-keyframes animate-svg-fill-87 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-87 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-87 {
  -webkit-animation: animate-svg-fill-87 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.186s both;
          animation: animate-svg-fill-87 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.186s both;
}

@-webkit-keyframes animate-svg-fill-88 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-88 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-88 {
  -webkit-animation: animate-svg-fill-88 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.187s both;
          animation: animate-svg-fill-88 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.187s both;
}

@-webkit-keyframes animate-svg-fill-89 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-89 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-89 {
  -webkit-animation: animate-svg-fill-89 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.188s both;
          animation: animate-svg-fill-89 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.188s both;
}

@-webkit-keyframes animate-svg-fill-90 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-90 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-90 {
  -webkit-animation: animate-svg-fill-90 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.189s both;
          animation: animate-svg-fill-90 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.189s both;
}

@-webkit-keyframes animate-svg-fill-91 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-91 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-91 {
  -webkit-animation: animate-svg-fill-91 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.19s both;
          animation: animate-svg-fill-91 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.19s both;
}

@-webkit-keyframes animate-svg-fill-92 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-92 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-92 {
  -webkit-animation: animate-svg-fill-92 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.191s both;
          animation: animate-svg-fill-92 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.191s both;
}

@-webkit-keyframes animate-svg-fill-93 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-93 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-93 {
  -webkit-animation: animate-svg-fill-93 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.192s both;
          animation: animate-svg-fill-93 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.192s both;
}

@-webkit-keyframes animate-svg-fill-94 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-94 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-94 {
  -webkit-animation: animate-svg-fill-94 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.193s both;
          animation: animate-svg-fill-94 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.193s both;
}

@-webkit-keyframes animate-svg-fill-95 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-95 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-95 {
  -webkit-animation: animate-svg-fill-95 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.194s both;
          animation: animate-svg-fill-95 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.194s both;
}

@-webkit-keyframes animate-svg-fill-96 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-96 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-96 {
  -webkit-animation: animate-svg-fill-96 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.195s both;
          animation: animate-svg-fill-96 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.195s both;
}

@-webkit-keyframes animate-svg-fill-97 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-97 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-97 {
  -webkit-animation: animate-svg-fill-97 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.196s both;
          animation: animate-svg-fill-97 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.196s both;
}

@-webkit-keyframes animate-svg-fill-98 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-98 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-98 {
  -webkit-animation: animate-svg-fill-98 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.197s both;
          animation: animate-svg-fill-98 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.197s both;
}

@-webkit-keyframes animate-svg-fill-99 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-99 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-99 {
  -webkit-animation: animate-svg-fill-99 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.198s both;
          animation: animate-svg-fill-99 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.198s both;
}

@-webkit-keyframes animate-svg-fill-100 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-100 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-100 {
  -webkit-animation: animate-svg-fill-100 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.199s both;
          animation: animate-svg-fill-100 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.199s both;
}

@-webkit-keyframes animate-svg-fill-101 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-101 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-101 {
  -webkit-animation: animate-svg-fill-101 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.2s both;
          animation: animate-svg-fill-101 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.2s both;
}

@-webkit-keyframes animate-svg-fill-102 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-102 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-102 {
  -webkit-animation: animate-svg-fill-102 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.201s both;
          animation: animate-svg-fill-102 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.201s both;
}

@-webkit-keyframes animate-svg-fill-103 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-103 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-103 {
  -webkit-animation: animate-svg-fill-103 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.202s both;
          animation: animate-svg-fill-103 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.202s both;
}

@-webkit-keyframes animate-svg-fill-104 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-104 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-104 {
  -webkit-animation: animate-svg-fill-104 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.203s both;
          animation: animate-svg-fill-104 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.203s both;
}

@-webkit-keyframes animate-svg-fill-105 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-105 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-105 {
  -webkit-animation: animate-svg-fill-105 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.20400000000000001s both;
          animation: animate-svg-fill-105 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.20400000000000001s both;
}

@-webkit-keyframes animate-svg-fill-106 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-106 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-106 {
  -webkit-animation: animate-svg-fill-106 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.20500000000000002s both;
          animation: animate-svg-fill-106 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.20500000000000002s both;
}

@-webkit-keyframes animate-svg-fill-107 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-107 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-107 {
  -webkit-animation: animate-svg-fill-107 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.20600000000000002s both;
          animation: animate-svg-fill-107 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.20600000000000002s both;
}

@-webkit-keyframes animate-svg-fill-108 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-108 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-108 {
  -webkit-animation: animate-svg-fill-108 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.20700000000000002s both;
          animation: animate-svg-fill-108 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.20700000000000002s both;
}

@-webkit-keyframes animate-svg-fill-109 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-109 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-109 {
  -webkit-animation: animate-svg-fill-109 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.20800000000000002s both;
          animation: animate-svg-fill-109 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.20800000000000002s both;
}

@-webkit-keyframes animate-svg-fill-110 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-110 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-110 {
  -webkit-animation: animate-svg-fill-110 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.20900000000000002s both;
          animation: animate-svg-fill-110 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.20900000000000002s both;
}

@-webkit-keyframes animate-svg-fill-111 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-111 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-111 {
  -webkit-animation: animate-svg-fill-111 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.21000000000000002s both;
          animation: animate-svg-fill-111 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.21000000000000002s both;
}

@-webkit-keyframes animate-svg-fill-112 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-112 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-112 {
  -webkit-animation: animate-svg-fill-112 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.21100000000000002s both;
          animation: animate-svg-fill-112 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.21100000000000002s both;
}

@-webkit-keyframes animate-svg-fill-113 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-113 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-113 {
  -webkit-animation: animate-svg-fill-113 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.21200000000000002s both;
          animation: animate-svg-fill-113 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.21200000000000002s both;
}

@-webkit-keyframes animate-svg-fill-114 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-114 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-114 {
  -webkit-animation: animate-svg-fill-114 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.21300000000000002s both;
          animation: animate-svg-fill-114 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.21300000000000002s both;
}

@-webkit-keyframes animate-svg-fill-115 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-115 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-115 {
  -webkit-animation: animate-svg-fill-115 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.21400000000000002s both;
          animation: animate-svg-fill-115 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.21400000000000002s both;
}

@-webkit-keyframes animate-svg-fill-116 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-116 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-116 {
  -webkit-animation: animate-svg-fill-116 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.21500000000000002s both;
          animation: animate-svg-fill-116 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.21500000000000002s both;
}

@-webkit-keyframes animate-svg-fill-117 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-117 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-117 {
  -webkit-animation: animate-svg-fill-117 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.21600000000000003s both;
          animation: animate-svg-fill-117 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.21600000000000003s both;
}

@-webkit-keyframes animate-svg-fill-118 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-118 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-118 {
  -webkit-animation: animate-svg-fill-118 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.21700000000000003s both;
          animation: animate-svg-fill-118 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.21700000000000003s both;
}

@-webkit-keyframes animate-svg-fill-119 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-119 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-119 {
  -webkit-animation: animate-svg-fill-119 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.21800000000000003s both;
          animation: animate-svg-fill-119 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.21800000000000003s both;
}

@-webkit-keyframes animate-svg-fill-120 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-120 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-120 {
  -webkit-animation: animate-svg-fill-120 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.21900000000000003s both;
          animation: animate-svg-fill-120 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.21900000000000003s both;
}

@-webkit-keyframes animate-svg-fill-121 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-121 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-121 {
  -webkit-animation: animate-svg-fill-121 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.22s both;
          animation: animate-svg-fill-121 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.22s both;
}

@-webkit-keyframes animate-svg-fill-122 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-122 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-122 {
  -webkit-animation: animate-svg-fill-122 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.221s both;
          animation: animate-svg-fill-122 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.221s both;
}

@-webkit-keyframes animate-svg-fill-123 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-123 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-123 {
  -webkit-animation: animate-svg-fill-123 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.222s both;
          animation: animate-svg-fill-123 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.222s both;
}

@-webkit-keyframes animate-svg-fill-124 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-124 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-124 {
  -webkit-animation: animate-svg-fill-124 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.223s both;
          animation: animate-svg-fill-124 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.223s both;
}

@-webkit-keyframes animate-svg-fill-125 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-125 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-125 {
  -webkit-animation: animate-svg-fill-125 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.224s both;
          animation: animate-svg-fill-125 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.224s both;
}

@-webkit-keyframes animate-svg-fill-126 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-126 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-126 {
  -webkit-animation: animate-svg-fill-126 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.225s both;
          animation: animate-svg-fill-126 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.225s both;
}

@-webkit-keyframes animate-svg-fill-127 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-127 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-127 {
  -webkit-animation: animate-svg-fill-127 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.226s both;
          animation: animate-svg-fill-127 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.226s both;
}

@-webkit-keyframes animate-svg-fill-128 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-128 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-128 {
  -webkit-animation: animate-svg-fill-128 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.227s both;
          animation: animate-svg-fill-128 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.227s both;
}

@-webkit-keyframes animate-svg-fill-129 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-129 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-129 {
  -webkit-animation: animate-svg-fill-129 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.228s both;
          animation: animate-svg-fill-129 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.228s both;
}

@-webkit-keyframes animate-svg-fill-130 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-130 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-130 {
  -webkit-animation: animate-svg-fill-130 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.229s both;
          animation: animate-svg-fill-130 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.229s both;
}

@-webkit-keyframes animate-svg-fill-131 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-131 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-131 {
  -webkit-animation: animate-svg-fill-131 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.23s both;
          animation: animate-svg-fill-131 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.23s both;
}

@-webkit-keyframes animate-svg-fill-132 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-132 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-132 {
  -webkit-animation: animate-svg-fill-132 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.231s both;
          animation: animate-svg-fill-132 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.231s both;
}

@-webkit-keyframes animate-svg-fill-133 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-133 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-133 {
  -webkit-animation: animate-svg-fill-133 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.232s both;
          animation: animate-svg-fill-133 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.232s both;
}

@-webkit-keyframes animate-svg-fill-134 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-134 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-134 {
  -webkit-animation: animate-svg-fill-134 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.233s both;
          animation: animate-svg-fill-134 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.233s both;
}

@-webkit-keyframes animate-svg-fill-135 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-135 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-135 {
  -webkit-animation: animate-svg-fill-135 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.234s both;
          animation: animate-svg-fill-135 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.234s both;
}

@-webkit-keyframes animate-svg-fill-136 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-136 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-136 {
  -webkit-animation: animate-svg-fill-136 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.23500000000000001s both;
          animation: animate-svg-fill-136 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.23500000000000001s both;
}

@-webkit-keyframes animate-svg-fill-137 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-137 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-137 {
  -webkit-animation: animate-svg-fill-137 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.23600000000000002s both;
          animation: animate-svg-fill-137 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.23600000000000002s both;
}

@-webkit-keyframes animate-svg-fill-138 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-138 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-138 {
  -webkit-animation: animate-svg-fill-138 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.23700000000000002s both;
          animation: animate-svg-fill-138 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.23700000000000002s both;
}

@-webkit-keyframes animate-svg-fill-139 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-139 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-139 {
  -webkit-animation: animate-svg-fill-139 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.23800000000000002s both;
          animation: animate-svg-fill-139 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.23800000000000002s both;
}

@-webkit-keyframes animate-svg-fill-140 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-140 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-140 {
  -webkit-animation: animate-svg-fill-140 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.23900000000000002s both;
          animation: animate-svg-fill-140 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.23900000000000002s both;
}

@-webkit-keyframes animate-svg-fill-141 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-141 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-141 {
  -webkit-animation: animate-svg-fill-141 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.24000000000000002s both;
          animation: animate-svg-fill-141 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.24000000000000002s both;
}

@-webkit-keyframes animate-svg-fill-142 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-142 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-142 {
  -webkit-animation: animate-svg-fill-142 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.24100000000000002s both;
          animation: animate-svg-fill-142 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.24100000000000002s both;
}

@-webkit-keyframes animate-svg-fill-143 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-143 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-143 {
  -webkit-animation: animate-svg-fill-143 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.24200000000000002s both;
          animation: animate-svg-fill-143 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.24200000000000002s both;
}

@-webkit-keyframes animate-svg-fill-144 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-144 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-144 {
  -webkit-animation: animate-svg-fill-144 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.24300000000000002s both;
          animation: animate-svg-fill-144 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.24300000000000002s both;
}

@-webkit-keyframes animate-svg-fill-145 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-145 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-145 {
  -webkit-animation: animate-svg-fill-145 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.24400000000000002s both;
          animation: animate-svg-fill-145 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.24400000000000002s both;
}

@-webkit-keyframes animate-svg-fill-146 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-146 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-146 {
  -webkit-animation: animate-svg-fill-146 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.245s both;
          animation: animate-svg-fill-146 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.245s both;
}

@-webkit-keyframes animate-svg-fill-147 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-147 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-147 {
  -webkit-animation: animate-svg-fill-147 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.246s both;
          animation: animate-svg-fill-147 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.246s both;
}

@-webkit-keyframes animate-svg-fill-148 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-148 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-148 {
  -webkit-animation: animate-svg-fill-148 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.247s both;
          animation: animate-svg-fill-148 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.247s both;
}

@-webkit-keyframes animate-svg-fill-149 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-149 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-149 {
  -webkit-animation: animate-svg-fill-149 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.248s both;
          animation: animate-svg-fill-149 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.248s both;
}

@-webkit-keyframes animate-svg-fill-150 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-150 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-150 {
  -webkit-animation: animate-svg-fill-150 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.249s both;
          animation: animate-svg-fill-150 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.249s both;
}

@-webkit-keyframes animate-svg-fill-151 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-151 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-151 {
  -webkit-animation: animate-svg-fill-151 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.25s both;
          animation: animate-svg-fill-151 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.25s both;
}

@-webkit-keyframes animate-svg-fill-152 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-152 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-152 {
  -webkit-animation: animate-svg-fill-152 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.251s both;
          animation: animate-svg-fill-152 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.251s both;
}

@-webkit-keyframes animate-svg-fill-153 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-153 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-153 {
  -webkit-animation: animate-svg-fill-153 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.252s both;
          animation: animate-svg-fill-153 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.252s both;
}

@-webkit-keyframes animate-svg-fill-154 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-154 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-154 {
  -webkit-animation: animate-svg-fill-154 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.253s both;
          animation: animate-svg-fill-154 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.253s both;
}

@-webkit-keyframes animate-svg-fill-155 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-155 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-155 {
  -webkit-animation: animate-svg-fill-155 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.254s both;
          animation: animate-svg-fill-155 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.254s both;
}

@-webkit-keyframes animate-svg-fill-156 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-156 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-156 {
  -webkit-animation: animate-svg-fill-156 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.255s both;
          animation: animate-svg-fill-156 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.255s both;
}

@-webkit-keyframes animate-svg-fill-157 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-157 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-157 {
  -webkit-animation: animate-svg-fill-157 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.256s both;
          animation: animate-svg-fill-157 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.256s both;
}

@-webkit-keyframes animate-svg-fill-158 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-158 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-158 {
  -webkit-animation: animate-svg-fill-158 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.257s both;
          animation: animate-svg-fill-158 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.257s both;
}

@-webkit-keyframes animate-svg-fill-159 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-159 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-159 {
  -webkit-animation: animate-svg-fill-159 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.258s both;
          animation: animate-svg-fill-159 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.258s both;
}

@-webkit-keyframes animate-svg-fill-160 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-160 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-160 {
  -webkit-animation: animate-svg-fill-160 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.259s both;
          animation: animate-svg-fill-160 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.259s both;
}

@-webkit-keyframes animate-svg-fill-161 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-161 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-161 {
  -webkit-animation: animate-svg-fill-161 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.26s both;
          animation: animate-svg-fill-161 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.26s both;
}

@-webkit-keyframes animate-svg-fill-162 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-162 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-162 {
  -webkit-animation: animate-svg-fill-162 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.261s both;
          animation: animate-svg-fill-162 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.261s both;
}

@-webkit-keyframes animate-svg-fill-163 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-163 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-163 {
  -webkit-animation: animate-svg-fill-163 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.262s both;
          animation: animate-svg-fill-163 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.262s both;
}

@-webkit-keyframes animate-svg-fill-164 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-164 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-164 {
  -webkit-animation: animate-svg-fill-164 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.263s both;
          animation: animate-svg-fill-164 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.263s both;
}

@-webkit-keyframes animate-svg-fill-165 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-165 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-165 {
  -webkit-animation: animate-svg-fill-165 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.264s both;
          animation: animate-svg-fill-165 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.264s both;
}

@-webkit-keyframes animate-svg-fill-166 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-166 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-166 {
  -webkit-animation: animate-svg-fill-166 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.265s both;
          animation: animate-svg-fill-166 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.265s both;
}

@-webkit-keyframes animate-svg-fill-167 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-167 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-167 {
  -webkit-animation: animate-svg-fill-167 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.266s both;
          animation: animate-svg-fill-167 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.266s both;
}

@-webkit-keyframes animate-svg-fill-168 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-168 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-168 {
  -webkit-animation: animate-svg-fill-168 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.267s both;
          animation: animate-svg-fill-168 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.267s both;
}

@-webkit-keyframes animate-svg-fill-169 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-169 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-169 {
  -webkit-animation: animate-svg-fill-169 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.268s both;
          animation: animate-svg-fill-169 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.268s both;
}

@-webkit-keyframes animate-svg-fill-170 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-170 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-170 {
  -webkit-animation: animate-svg-fill-170 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.269s both;
          animation: animate-svg-fill-170 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.269s both;
}

@-webkit-keyframes animate-svg-fill-171 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-171 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-171 {
  -webkit-animation: animate-svg-fill-171 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.27s both;
          animation: animate-svg-fill-171 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.27s both;
}

@-webkit-keyframes animate-svg-fill-172 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-172 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-172 {
  -webkit-animation: animate-svg-fill-172 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.271s both;
          animation: animate-svg-fill-172 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.271s both;
}

@-webkit-keyframes animate-svg-fill-173 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-173 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-173 {
  -webkit-animation: animate-svg-fill-173 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.272s both;
          animation: animate-svg-fill-173 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.272s both;
}

@-webkit-keyframes animate-svg-fill-174 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-174 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-174 {
  -webkit-animation: animate-svg-fill-174 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.273s both;
          animation: animate-svg-fill-174 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.273s both;
}

@-webkit-keyframes animate-svg-fill-175 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-175 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-175 {
  -webkit-animation: animate-svg-fill-175 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.274s both;
          animation: animate-svg-fill-175 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.274s both;
}

@-webkit-keyframes animate-svg-fill-176 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-176 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-176 {
  -webkit-animation: animate-svg-fill-176 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.275s both;
          animation: animate-svg-fill-176 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.275s both;
}

@-webkit-keyframes animate-svg-fill-177 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-177 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-177 {
  -webkit-animation: animate-svg-fill-177 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.276s both;
          animation: animate-svg-fill-177 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.276s both;
}

@-webkit-keyframes animate-svg-fill-178 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-178 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-178 {
  -webkit-animation: animate-svg-fill-178 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.277s both;
          animation: animate-svg-fill-178 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.277s both;
}

@-webkit-keyframes animate-svg-fill-179 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-179 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-179 {
  -webkit-animation: animate-svg-fill-179 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.278s both;
          animation: animate-svg-fill-179 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.278s both;
}

@-webkit-keyframes animate-svg-fill-180 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-180 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-180 {
  -webkit-animation: animate-svg-fill-180 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.279s both;
          animation: animate-svg-fill-180 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.279s both;
}

@-webkit-keyframes animate-svg-fill-181 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-181 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-181 {
  -webkit-animation: animate-svg-fill-181 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.28s both;
          animation: animate-svg-fill-181 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.28s both;
}

@-webkit-keyframes animate-svg-fill-182 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-182 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-182 {
  -webkit-animation: animate-svg-fill-182 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.281s both;
          animation: animate-svg-fill-182 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.281s both;
}

@-webkit-keyframes animate-svg-fill-183 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-183 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-183 {
  -webkit-animation: animate-svg-fill-183 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.28200000000000003s both;
          animation: animate-svg-fill-183 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.28200000000000003s both;
}

@-webkit-keyframes animate-svg-fill-184 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

@keyframes animate-svg-fill-184 {
  0% {
    fill: transparent;
  }

  100% {
    fill: rgb(73, 0, 0);
  }
}

.svg-elem-184 {
  -webkit-animation: animate-svg-fill-184 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.28300000000000003s both;
          animation: animate-svg-fill-184 0s cubic-bezier(0.47, 0, 0.745, 0.715) 0.28300000000000003s both;
}

    </style>
  </defs>
  <title>line1</title>
<g transform="translate(0.000000,322.000000) scale(0.100000,-0.100000)" fill="#490000" stroke="none">
<path d="M2373 2966 c4 -52 9 -62 26 -42 14 16 5 60 -15 76 -11 10 -13 4 -11
-34z" class="svg-elem-1"></path>
<path d="M2280 2987 c0 -42 33 -61 68 -39 15 10 6 42 -12 42 -6 0 -21 3 -33 6
-17 5 -23 2 -23 -9z" class="svg-elem-2"></path>
<path d="M2430 2985 c-6 -8 -9 -23 -5 -35 7 -21 7 -21 32 4 25 25 24 46 -1 46
-8 0 -19 -7 -26 -15z" class="svg-elem-3"></path>
<path d="M2460 2913 c0 -39 16 -61 31 -46 9 9 9 19 -1 42 -16 38 -30 40 -30 4z" class="svg-elem-4"></path>
<path d="M2266 2913 c-13 -13 -5 -53 13 -62 22 -12 45 8 39 35 -3 17 -42 37
-52 27z" class="svg-elem-5"></path>
<path d="M2340 2874 c0 -32 4 -44 13 -42 15 6 21 32 13 64 -10 40 -26 27 -26
-22z" class="svg-elem-6"></path>
<path d="M2403 2903 c-13 -5 -18 -45 -7 -55 3 -3 17 5 31 18 33 31 18 55 -24
37z" class="svg-elem-7"></path>
<path d="M2435 2851 c-10 -17 3 -77 20 -91 12 -10 15 -10 15 1 0 8 2 23 5 34
6 25 -29 74 -40 56z" class="svg-elem-8"></path>
<path d="M2372 2818 c-15 -15 -16 -54 -2 -63 6 -3 10 -1 10 6 0 7 7 20 16 30
25 27 2 53 -24 27z" class="svg-elem-9"></path>
<path d="M2319 2816 c-3 -3 -3 -23 -1 -46 5 -49 28 -49 25 0 -1 31 -14 55 -24
46z" class="svg-elem-10"></path>
<path d="M2235 2800 c-10 -15 14 -50 34 -50 23 0 42 22 33 36 -10 16 -60 26
-67 14z" class="svg-elem-11"></path>
<path d="M2400 2751 c0 -27 21 -81 31 -81 20 0 19 29 -1 64 -25 41 -30 44 -30
17z" class="svg-elem-12"></path>
<path d="M2215 2710 c-8 -27 12 -52 39 -48 38 5 30 49 -11 62 -16 5 -23 2 -28
-14z" class="svg-elem-13"></path>
<path d="M2294 2683 c4 -49 19 -67 30 -37 8 20 -11 84 -24 84 -5 0 -8 -21 -6
-47z" class="svg-elem-14"></path>
<path d="M2350 2715 c-14 -17 -5 -69 10 -60 6 3 10 12 10 20 0 7 5 15 12 17
13 5 4 38 -10 38 -5 0 -15 -7 -22 -15z" class="svg-elem-15"></path>
<path d="M2380 2637 c0 -18 6 -42 14 -53 14 -18 15 -18 21 9 8 30 -7 77 -25
77 -5 0 -10 -15 -10 -33z" class="svg-elem-16"></path>
<path d="M2272 2585 c1 -28 5 -44 12 -42 14 5 19 32 12 63 -10 40 -24 27 -24
-21z" class="svg-elem-17"></path>
<path d="M2333 2623 c-15 -6 -18 -63 -3 -63 6 0 10 7 10 15 0 8 5 15 10 15 6
0 10 9 10 20 0 20 -5 23 -27 13z" class="svg-elem-18"></path>
<path d="M2194 2609 c-10 -17 7 -49 25 -49 22 0 45 25 37 38 -8 13 -55 21 -62
11z" class="svg-elem-19"></path>
<path d="M2357 2564 c-3 -3 -4 -11 -2 -17 2 -7 6 -24 9 -39 4 -16 10 -28 15
-28 17 0 20 30 5 59 -17 33 -18 34 -27 25z" class="svg-elem-20"></path>
<path d="M2167 2518 c-9 -31 14 -52 47 -44 14 3 26 10 26 14 0 15 -25 40 -46
46 -17 5 -23 1 -27 -16z" class="svg-elem-21"></path>
<path d="M2243 2519 c4 -13 7 -37 7 -54 0 -27 1 -28 17 -13 13 13 14 24 7 49
-11 39 -41 56 -31 18z" class="svg-elem-22"></path>
<path d="M2302 2528 c-14 -14 -16 -44 -4 -52 13 -8 44 34 38 50 -7 17 -18 18
-34 2z" class="svg-elem-23"></path>
<path d="M2333 2443 c4 -20 13 -43 21 -51 13 -13 16 -12 21 10 4 17 1 35 -10
52 -25 38 -39 33 -32 -11z" class="svg-elem-24"></path>
<path d="M2288 2439 c-18 -10 -25 -54 -10 -63 9 -5 35 49 30 63 -2 6 -10 6
-20 0z" class="svg-elem-25"></path>
<path d="M2140 2417 c0 -32 13 -41 46 -33 27 7 30 37 4 42 -8 1 -23 5 -32 9
-14 6 -18 2 -18 -18z" class="svg-elem-26"></path>
<path d="M2224 2403 c2 -40 15 -54 29 -31 10 15 -8 68 -22 68 -5 0 -8 -17 -7
-37z" class="svg-elem-27"></path>
<path d="M2310 2351 c0 -41 23 -74 33 -47 6 15 -18 86 -28 86 -3 0 -5 -17 -5
-39z" class="svg-elem-28"></path>
<path d="M2116 2334 c-9 -34 5 -48 38 -40 39 10 32 47 -10 60 -18 5 -23 2 -28
-20z" class="svg-elem-29"></path>
<path d="M2193 2310 c0 -25 4 -40 12 -40 19 0 26 27 15 55 -14 37 -27 30 -27
-15z" class="svg-elem-30"></path>
<path d="M2252 2338 c-13 -13 -16 -41 -6 -51 8 -7 44 36 44 52 0 15 -23 14
-38 -1z" class="svg-elem-31"></path>
<path d="M2287 2294 c-19 -19 3 -101 24 -89 5 4 9 16 9 28 -1 28 -24 70 -33
61z" class="svg-elem-32"></path>
<path d="M2169 2270 c-8 -38 -5 -90 4 -87 16 5 21 67 8 80 -6 6 -11 9 -12 7z" class="svg-elem-33"></path>
<path d="M2077 2246 c-7 -18 12 -36 39 -36 25 0 41 17 28 30 -18 16 -62 20
-67 6z" class="svg-elem-34"></path>
<path d="M2217 2253 c-10 -9 -9 -53 1 -53 10 0 42 38 42 50 0 11 -33 14 -43 3z" class="svg-elem-35"></path>
<path d="M2250 2179 c0 -52 30 -89 44 -54 5 13 -29 85 -40 85 -2 0 -4 -14 -4
-31z" class="svg-elem-36"></path>
<path d="M2044 2168 c-8 -26 17 -48 46 -41 26 7 26 39 1 53 -29 15 -39 12 -47
-12z" class="svg-elem-37"></path>
<path d="M2132 2135 c0 -31 4 -45 11 -42 7 2 12 21 12 42 0 21 -5 40 -12 42
-7 3 -11 -11 -11 -42z" class="svg-elem-38"></path>
<path d="M2192 2168 c-12 -12 -17 -58 -7 -58 14 0 46 43 41 56 -7 17 -18 18
-34 2z" class="svg-elem-39"></path>
<path d="M2220 2091 c0 -58 20 -78 40 -41 8 15 7 26 -6 45 -22 33 -34 32 -34
-4z" class="svg-elem-40"></path>
<path d="M2007 2088 c-8 -30 -1 -38 39 -38 37 0 49 26 17 36 -10 3 -25 9 -34
14 -13 7 -18 4 -22 -12z" class="svg-elem-41"></path>
<path d="M2100 2083 c0 -10 -3 -28 -6 -40 -5 -17 -2 -23 9 -23 23 0 29 16 22
50 -7 32 -25 41 -25 13z" class="svg-elem-42"></path>
<path d="M2162 2078 c-12 -12 -17 -48 -6 -48 8 0 43 43 44 53 0 11 -25 8 -38
-5z" class="svg-elem-43"></path>
<path d="M1972 2028 c-18 -18 -14 -36 8 -48 20 -11 60 -5 60 8 -1 27 -52 56
-68 40z" class="svg-elem-44"></path>
<path d="M2184 2026 c-8 -21 6 -68 22 -73 20 -7 22 22 4 57 -16 30 -19 33 -26
16z" class="svg-elem-45"></path>
<path d="M2057 2023 c-8 -15 -6 -83 2 -83 18 0 32 29 25 54 -7 28 -20 41 -27
29z" class="svg-elem-46"></path>
<path d="M2110 1995 c-7 -8 -10 -22 -6 -30 5 -14 9 -14 31 2 13 10 25 24 25
31 0 17 -35 15 -50 -3z" class="svg-elem-47"></path>
<path d="M1916 1943 c-10 -25 10 -37 57 -34 24 1 22 31 -2 31 -11 0 -23 5 -26
10 -9 15 -22 12 -29 -7z" class="svg-elem-48"></path>
<path d="M2144 1922 c3 -20 12 -42 20 -50 13 -13 16 -12 22 12 8 32 -11 73
-33 73 -12 0 -14 -8 -9 -35z" class="svg-elem-49"></path>
<path d="M2007 1913 c-3 -16 -2 -32 3 -37 14 -14 30 4 30 35 0 37 -26 39 -33
2z" class="svg-elem-50"></path>
<path d="M2078 1929 c-19 -11 -25 -49 -8 -49 18 0 53 38 45 49 -8 13 -15 13
-37 0z" class="svg-elem-51"></path>
<path d="M1870 1885 c-18 -21 4 -45 41 -45 33 0 43 11 26 33 -19 23 -52 30
-67 12z" class="svg-elem-52"></path>
<path d="M1962 1863 c1 -10 -1 -24 -6 -31 -13 -21 10 -38 29 -22 18 15 20 41
3 58 -17 17 -30 15 -26 -5z" class="svg-elem-53"></path>
<path d="M2100 1856 c0 -34 10 -56 25 -56 23 0 25 16 9 49 -18 37 -34 40 -34
7z" class="svg-elem-54"></path>
<path d="M2027 1853 c-13 -12 -8 -45 6 -39 6 3 20 9 30 12 25 9 21 34 -6 34
-13 0 -27 -3 -30 -7z" class="svg-elem-55"></path>
<path d="M1813 1814 c-7 -20 13 -34 50 -34 17 0 27 5 27 15 0 8 -9 15 -19 15
-11 0 -23 5 -26 10 -9 15 -25 12 -32 -6z" class="svg-elem-56"></path>
<path d="M1910 1784 c-13 -34 -13 -34 9 -34 21 0 33 22 25 45 -9 23 -23 18
-34 -11z" class="svg-elem-57"></path>
<path d="M2054 1797 c-6 -17 12 -67 25 -67 6 0 15 9 21 20 7 14 7 20 0 20 -5
0 -10 9 -10 20 0 22 -28 28 -36 7z" class="svg-elem-58"></path>
<path d="M1980 1783 c-29 -20 -12 -37 23 -24 15 6 27 15 27 20 0 17 -28 19
-50 4z" class="svg-elem-59"></path>
<path d="M1760 1765 c-11 -13 -10 -18 6 -30 10 -8 31 -15 47 -15 37 0 35 25
-3 45 -36 18 -35 18 -50 0z" class="svg-elem-60"></path>
<path d="M1856 1719 c-7 -37 -3 -44 19 -35 11 4 15 15 13 33 -4 38 -24 39 -32
2z" class="svg-elem-61"></path>
<path d="M2000 1717 c0 -34 25 -65 41 -50 9 9 8 18 -2 42 -16 36 -39 41 -39 8z" class="svg-elem-62"></path>
<path d="M1916 1714 c-8 -22 3 -39 17 -25 6 6 19 11 29 11 10 0 18 7 18 15 0
21 -56 20 -64 -1z" class="svg-elem-63"></path>
<path d="M1700 1705 c-13 -16 4 -30 48 -40 44 -9 42 15 -3 36 -27 13 -37 14
-45 4z" class="svg-elem-64"></path>
<path d="M1800 1665 c-14 -36 -13 -37 13 -33 16 2 22 10 22 27 0 34 -23 38
-35 6z" class="svg-elem-65"></path>
<path d="M1950 1651 c0 -38 25 -60 46 -40 12 12 12 19 2 42 -18 37 -48 36 -48
-2z" class="svg-elem-66"></path>
<path d="M1640 1655 c-17 -20 -3 -35 38 -41 40 -7 52 14 21 37 -29 23 -43 24
-59 4z" class="svg-elem-67"></path>
<path d="M1860 1651 c-7 -14 -7 -20 2 -23 17 -6 58 15 58 30 0 20 -48 14 -60
-7z" class="svg-elem-68"></path>
<path d="M1737 1613 c-7 -35 4 -47 27 -30 13 10 16 20 12 35 -10 31 -33 27
-39 -5z" class="svg-elem-69"></path>
<path d="M1818 1612 c-10 -2 -18 -13 -18 -24 0 -14 5 -18 16 -14 9 3 24 6 35
6 10 0 19 6 19 14 0 15 -25 24 -52 18z" class="svg-elem-70"></path>
<path d="M1897 1613 c-11 -11 -8 -38 7 -58 11 -16 16 -17 29 -7 14 12 14 16
-1 43 -17 30 -24 34 -35 22z" class="svg-elem-71"></path>
<path d="M1572 1598 c6 -18 56 -41 74 -34 23 9 16 21 -19 34 -43 15 -60 15
-55 0z" class="svg-elem-72"></path>
<path d="M1683 1570 c-3 -11 -9 -20 -14 -20 -5 0 -6 -6 -3 -14 6 -15 34 -11
45 7 9 13 -1 47 -13 47 -5 0 -12 -9 -15 -20z" class="svg-elem-73"></path>
<path d="M1514 1565 c-19 -15 -19 -15 0 -30 24 -18 76 -20 76 -2 0 7 -13 20
-29 30 -25 14 -30 15 -47 2z" class="svg-elem-74"></path>
<path d="M1752 1559 c-23 -9 -26 -35 -4 -33 7 1 21 2 32 3 22 1 27 26 8 34 -7
2 -24 0 -36 -4z" class="svg-elem-75"></path>
<path d="M1836 1548 c-5 -22 9 -58 23 -58 19 0 32 29 22 48 -16 29 -38 34 -45
10z" class="svg-elem-76"></path>
<path d="M1613 1526 c3 -8 2 -18 -3 -21 -18 -11 -10 -26 13 -23 29 4 32 51 3
56 -14 3 -17 0 -13 -12z" class="svg-elem-77"></path>
<path d="M1436 1505 c7 -18 42 -28 75 -23 23 3 23 4 -8 21 -41 22 -75 23 -67
2z" class="svg-elem-78"></path>
<path d="M1777 1513 c-22 -21 9 -80 36 -70 15 6 15 10 -4 42 -23 38 -23 38
-32 28z" class="svg-elem-79"></path>
<path d="M1675 1500 c-4 -7 -3 -15 1 -20 13 -12 76 0 71 14 -5 15 -63 20 -72
6z" class="svg-elem-80"></path>
<path d="M1374 1479 c-9 -16 16 -37 50 -41 40 -4 44 17 7 36 -36 19 -47 20
-57 5z" class="svg-elem-81"></path>
<path d="M1550 1475 c0 -8 -4 -15 -10 -15 -5 0 -10 -4 -10 -10 0 -5 11 -10 24
-10 24 0 41 23 30 41 -9 15 -34 10 -34 -6z" class="svg-elem-82"></path>
<path d="M1615 1457 c-24 -18 -6 -29 34 -21 34 7 40 18 15 28 -22 9 -28 8 -49
-7z" class="svg-elem-83"></path>
<path d="M1480 1440 c0 -11 -5 -20 -11 -20 -5 0 -7 -4 -4 -10 8 -13 42 -13 50
0 10 16 -5 50 -21 50 -8 0 -14 -9 -14 -20z" class="svg-elem-84"></path>
<path d="M1710 1436 c0 -33 22 -49 45 -33 15 12 16 16 4 35 -19 30 -49 29 -49
-2z" class="svg-elem-85"></path>
<path d="M1304 1438 c-10 -15 24 -38 58 -38 36 0 35 11 -3 33 -36 20 -45 21
-55 5z" class="svg-elem-86"></path>
<path d="M1557 1422 c-11 -2 -17 -10 -14 -20 2 -10 10 -15 18 -13 8 2 24 3 37
2 14 0 22 4 20 11 -5 14 -38 25 -61 20z" class="svg-elem-87"></path>
<path d="M1244 1406 c-16 -12 -15 -14 7 -29 28 -20 69 -22 69 -4 0 6 -13 19
-29 29 -24 13 -33 14 -47 4z" class="svg-elem-88"></path>
<path d="M1643 1404 c-8 -20 8 -48 31 -52 18 -4 20 6 6 42 -11 30 -28 34 -37
10z" class="svg-elem-89"></path>
<path d="M1409 1390 c-20 -21 -7 -40 22 -33 12 3 19 14 19 29 0 28 -18 30 -41
4z" class="svg-elem-90"></path>
<path d="M1349 1375 c-1 -3 -2 -9 -3 -14 0 -5 -4 -13 -8 -17 -15 -14 -8 -24
16 -24 28 0 37 17 24 43 -8 16 -26 23 -29 12z" class="svg-elem-91"></path>
<path d="M1472 1363 c2 -10 11 -16 19 -14 8 2 22 4 32 5 35 1 17 26 -19 26
-29 0 -35 -3 -32 -17z" class="svg-elem-92"></path>
<path d="M1576 1365 c-7 -19 13 -65 29 -65 7 0 18 7 25 15 10 12 10 18 -1 33
-28 35 -44 40 -53 17z" class="svg-elem-93"></path>
<path d="M1170 1361 c0 -13 22 -27 52 -35 42 -10 43 12 2 29 -42 17 -54 19
-54 6z" class="svg-elem-94"></path>
<path d="M1096 1331 c-9 -14 19 -31 58 -38 42 -7 47 7 11 31 -27 18 -61 21
-69 7z" class="svg-elem-95"></path>
<path d="M1280 1326 c0 -9 -4 -16 -10 -16 -5 0 -10 -7 -10 -16 0 -11 5 -14 16
-10 9 3 20 6 26 6 14 0 6 43 -9 48 -7 2 -13 -3 -13 -12z" class="svg-elem-96"></path>
<path d="M1407 1333 c-9 -15 7 -33 22 -24 7 5 22 6 33 3 15 -3 19 -1 16 9 -5
16 -63 25 -71 12z" class="svg-elem-97"></path>
<path d="M1510 1321 c-13 -24 17 -66 38 -52 12 7 11 14 -2 40 -19 36 -22 37
-36 12z" class="svg-elem-98"></path>
<path d="M1207 1304 c-3 -3 -3 -12 0 -20 3 -8 0 -14 -6 -14 -6 0 -11 -4 -11
-10 0 -14 33 -13 48 2 7 7 8 17 1 30 -10 18 -21 23 -32 12z" class="svg-elem-99"></path>
<path d="M1337 1295 c-8 -20 3 -25 43 -16 l35 8 -28 12 c-37 14 -44 14 -50 -4z" class="svg-elem-100"></path>
<path d="M1442 1268 c3 -34 22 -45 46 -30 19 13 -5 62 -30 62 -16 0 -19 -6
-16 -32z" class="svg-elem-101"></path>
<path d="M1050 1276 c0 -15 21 -26 51 -26 27 0 24 15 -6 28 -34 16 -45 15 -45
-2z" class="svg-elem-102"></path>
<path d="M1140 1257 c0 -9 -4 -17 -10 -19 -5 -2 -6 -9 -1 -17 13 -21 43 -5 39
21 -3 24 -28 38 -28 15z" class="svg-elem-103"></path>
<path d="M1264 1259 c-10 -17 12 -26 53 -21 34 4 35 6 18 18 -23 17 -61 18
-71 3z" class="svg-elem-104"></path>
<path d="M974 1249 c-10 -16 8 -29 49 -36 42 -7 49 7 15 31 -26 19 -54 21 -64
5z" class="svg-elem-105"></path>
<path d="M1370 1241 c0 -30 11 -51 25 -51 21 0 26 16 14 44 -14 30 -39 35 -39
7z" class="svg-elem-106"></path>
<path d="M1200 1230 c-25 -15 2 -31 40 -24 30 7 32 8 15 21 -22 15 -34 16 -55
3z" class="svg-elem-107"></path>
<path d="M1080 1217 c0 -9 -6 -17 -12 -20 -10 -3 -10 -7 -1 -17 17 -19 45 -4
41 22 -3 24 -28 38 -28 15z" class="svg-elem-108"></path>
<path d="M910 1206 c0 -18 55 -40 77 -31 15 5 12 10 -17 25 -42 23 -60 25 -60
6z" class="svg-elem-109"></path>
<path d="M1300 1196 c0 -29 22 -49 44 -40 19 7 20 18 6 45 -16 28 -50 25 -50
-5z" class="svg-elem-110"></path>
<path d="M1135 1190 c-14 -23 18 -31 75 -20 3 0 -4 7 -14 15 -23 17 -52 20
-61 5z" class="svg-elem-111"></path>
<path d="M863 1183 c-21 -8 -15 -29 12 -41 34 -16 55 -15 55 2 0 11 -42 48
-52 45 -2 0 -9 -3 -15 -6z" class="svg-elem-112"></path>
<path d="M1013 1163 c-15 -32 -12 -37 17 -28 14 5 20 13 18 28 -4 30 -21 31
-35 0z" class="svg-elem-113"></path>
<path d="M1230 1172 c0 -28 25 -56 43 -49 15 6 15 9 -1 37 -19 33 -42 40 -42
12z" class="svg-elem-114"></path>
<path d="M1077 1153 c-4 -3 -7 -13 -7 -20 0 -11 8 -13 33 -8 40 9 45 14 27 25
-18 11 -44 13 -53 3z" class="svg-elem-115"></path>
<path d="M953 1135 c4 -8 2 -17 -4 -20 -10 -7 -3 -25 9 -25 4 0 13 4 21 9 17
11 5 51 -16 51 -9 0 -13 -6 -10 -15z" class="svg-elem-116"></path>
<path d="M1170 1131 c0 -32 11 -51 30 -51 28 0 34 18 16 45 -20 30 -46 33 -46
6z" class="svg-elem-117"></path>
<path d="M797 1133 c-12 -12 -7 -20 18 -31 56 -26 77 -5 23 22 -36 19 -33 18
-41 9z" class="svg-elem-118"></path>
<path d="M1010 1101 c0 -15 6 -18 30 -16 37 3 49 13 30 25 -26 17 -60 12 -60
-9z" class="svg-elem-119"></path>
<path d="M899 1106 c-1 -3 -2 -9 -3 -13 -1 -5 -5 -14 -9 -21 -10 -16 20 -29
35 -14 13 13 7 44 -9 50 -7 2 -14 1 -14 -2z" class="svg-elem-120"></path>
<path d="M1110 1081 c0 -33 13 -46 37 -37 12 5 14 9 5 18 -7 7 -12 20 -12 30
0 10 -7 18 -15 18 -10 0 -15 -10 -15 -29z" class="svg-elem-121"></path>
<path d="M745 1090 c-11 -18 15 -40 46 -40 36 0 37 12 4 34 -28 19 -41 20 -50
6z" class="svg-elem-122"></path>
<path d="M950 1059 c0 -18 4 -20 27 -14 34 8 37 11 28 24 -3 6 -17 11 -31 11
-18 0 -24 -5 -24 -21z" class="svg-elem-123"></path>
<path d="M835 1061 c4 -7 1 -18 -5 -26 -10 -12 -9 -16 5 -21 9 -4 21 -2 27 4
15 15 5 46 -16 50 -12 3 -16 0 -11 -7z" class="svg-elem-124"></path>
<path d="M1040 1046 c0 -29 22 -49 44 -40 19 7 20 18 6 45 -16 28 -50 25 -50
-5z" class="svg-elem-125"></path>
<path d="M691 1046 c-10 -11 -7 -17 11 -30 28 -20 58 -21 58 -1 0 8 -5 15 -12
15 -6 0 -19 7 -28 15 -15 13 -19 14 -29 1z" class="svg-elem-126"></path>
<path d="M892 1023 c2 -13 12 -18 32 -18 36 1 45 20 14 29 -38 10 -50 7 -46
-11z" class="svg-elem-127"></path>
<path d="M984 1016 c-7 -19 13 -56 30 -56 23 0 26 12 9 41 -19 32 -31 36 -39
15z" class="svg-elem-128"></path>
<path d="M790 1005 c0 -8 -4 -15 -10 -15 -5 0 -10 -4 -10 -10 0 -12 37 -13 44
-1 8 12 -3 41 -15 41 -5 0 -9 -7 -9 -15z" class="svg-elem-129"></path>
<path d="M644 995 c-9 -22 4 -35 37 -35 36 0 39 22 4 38 -33 15 -34 15 -41 -3z" class="svg-elem-130"></path>
<path d="M837 985 c-8 -19 2 -24 36 -18 30 6 35 18 11 27 -26 10 -41 7 -47 -9z" class="svg-elem-131"></path>
<path d="M930 968 c0 -35 15 -51 39 -43 20 6 20 8 6 36 -18 35 -45 39 -45 7z" class="svg-elem-132"></path>
<path d="M727 953 c-6 -33 -3 -38 18 -29 10 3 15 15 13 28 -5 32 -25 33 -31 1z" class="svg-elem-133"></path>
<path d="M595 950 c-10 -16 15 -40 41 -40 30 0 30 7 2 31 -27 21 -34 23 -43 9z" class="svg-elem-134"></path>
<path d="M782 933 c3 -13 12 -17 33 -15 35 4 39 7 30 21 -3 6 -20 11 -36 11
-24 0 -30 -4 -27 -17z" class="svg-elem-135"></path>
<path d="M870 928 c0 -33 15 -52 34 -45 15 6 15 9 1 37 -18 35 -35 39 -35 8z" class="svg-elem-136"></path>
<path d="M676 904 c-8 -31 -3 -39 19 -30 10 3 15 15 13 28 -4 31 -25 33 -32 2z" class="svg-elem-137"></path>
<path d="M547 896 c-7 -19 12 -36 40 -36 27 0 30 18 6 36 -23 17 -40 17 -46 0z" class="svg-elem-138"></path>
<path d="M734 895 c-13 -34 10 -37 56 -7 7 5 -23 22 -38 22 -7 0 -15 -7 -18
-15z" class="svg-elem-139"></path>
<path d="M820 881 c0 -30 11 -51 26 -51 20 0 28 25 14 49 -14 26 -40 27 -40 2z" class="svg-elem-140"></path>
<path d="M630 866 c0 -14 0 -29 0 -33 0 -5 6 -8 13 -8 7 0 12 13 12 29 0 16
-6 31 -12 34 -8 2 -13 -6 -13 -22z" class="svg-elem-141"></path>
<path d="M687 853 c-4 -3 -7 -13 -7 -21 0 -10 7 -12 27 -7 36 9 41 14 23 25
-18 11 -34 13 -43 3z" class="svg-elem-142"></path>
<path d="M767 853 c-10 -20 11 -73 29 -73 17 0 17 4 2 47 -12 32 -23 41 -31
26z" class="svg-elem-143"></path>
<path d="M500 835 c0 -18 37 -38 56 -31 21 8 17 20 -13 34 -35 16 -43 15 -43
-3z" class="svg-elem-144"></path>
<path d="M590 816 c0 -8 -3 -21 -6 -30 -4 -10 -1 -16 9 -16 21 0 27 12 20 38
-6 24 -23 30 -23 8z" class="svg-elem-145"></path>
<path d="M636 795 c-3 -9 -4 -20 -1 -25 7 -11 56 12 52 25 -6 17 -44 17 -51 0z" class="svg-elem-146"></path>
<path d="M720 782 c0 -26 15 -52 31 -52 14 0 18 31 7 55 -15 34 -38 32 -38 -3z" class="svg-elem-147"></path>
<path d="M461 786 c-17 -20 24 -49 50 -35 17 9 16 39 -1 39 -5 0 -15 2 -23 5
-7 3 -19 -1 -26 -9z" class="svg-elem-148"></path>
<path d="M541 764 c2 -11 0 -24 -4 -31 -10 -15 12 -28 25 -15 13 13 6 54 -10
60 -9 3 -13 -3 -11 -14z" class="svg-elem-149"></path>
<path d="M670 737 c0 -32 25 -65 39 -51 8 7 7 19 -5 42 -18 38 -34 42 -34 9z" class="svg-elem-150"></path>
<path d="M590 729 c0 -15 4 -19 16 -15 9 3 22 6 30 6 8 0 14 7 14 15 0 10 -10
15 -30 15 -24 0 -30 -4 -30 -21z" class="svg-elem-151"></path>
<path d="M421 727 c-15 -15 6 -37 35 -37 31 0 31 22 0 36 -17 8 -28 8 -35 1z" class="svg-elem-152"></path>
<path d="M496 688 c-8 -38 -1 -47 20 -26 10 10 14 23 9 37 -9 30 -22 26 -29
-11z" class="svg-elem-153"></path>
<path d="M624 697 c-7 -20 14 -67 30 -67 22 0 28 16 15 44 -14 29 -38 41 -45
23z" class="svg-elem-154"></path>
<path d="M557 694 c-11 -11 -8 -44 3 -44 6 0 10 5 10 10 0 6 7 10 16 10 9 0
14 6 12 13 -5 14 -31 21 -41 11z" class="svg-elem-155"></path>
<path d="M376 664 c-8 -22 -8 -22 13 -34 23 -12 51 -3 51 16 0 13 -29 34 -48
34 -6 0 -13 -7 -16 -16z" class="svg-elem-156"></path>
<path d="M459 668 c-6 -28 -6 -78 0 -78 20 0 31 28 21 54 -8 22 -18 33 -21 24z" class="svg-elem-157"></path>
<path d="M580 627 c0 -33 25 -65 40 -51 8 8 6 19 -7 42 -21 38 -33 41 -33 9z" class="svg-elem-158"></path>
<path d="M504 625 c-3 -8 -3 -18 0 -24 8 -12 56 10 56 27 0 17 -49 15 -56 -3z" class="svg-elem-159"></path>
<path d="M333 594 c-8 -21 10 -36 38 -32 32 4 34 22 4 36 -33 15 -34 15 -42
-4z" class="svg-elem-160"></path>
<path d="M420 588 c0 -7 -3 -23 -6 -35 -5 -17 -2 -23 10 -23 18 0 23 54 6 65
-5 3 -10 0 -10 -7z" class="svg-elem-161"></path>
<path d="M540 562 c0 -36 25 -61 43 -43 9 9 8 18 -3 38 -22 38 -40 41 -40 5z" class="svg-elem-162"></path>
<path d="M467 573 c-9 -9 -9 -43 1 -43 13 1 42 27 42 39 0 12 -32 15 -43 4z" class="svg-elem-163"></path>
<path d="M297 543 c-4 -3 -7 -15 -7 -25 0 -13 8 -18 30 -18 23 0 30 5 30 19 0
24 -37 41 -53 24z" class="svg-elem-164"></path>
<path d="M370 522 c0 -11 -3 -27 -6 -36 -4 -12 0 -16 16 -16 18 0 21 5 18 32
-3 35 -28 52 -28 20z" class="svg-elem-165"></path>
<path d="M500 496 c0 -38 26 -69 36 -43 5 14 -20 77 -31 77 -3 0 -5 -15 -5
-34z" class="svg-elem-166"></path>
<path d="M433 513 c-7 -2 -13 -13 -13 -24 0 -22 0 -22 35 -9 23 9 25 13 15 25
-13 16 -17 17 -37 8z" class="svg-elem-167"></path>
<path d="M244 465 c-9 -22 5 -35 37 -35 38 0 38 22 -2 37 -24 9 -31 9 -35 -2z" class="svg-elem-168"></path>
<path d="M330 452 c0 -10 -5 -23 -11 -29 -8 -8 -7 -13 1 -18 18 -11 43 19 35
44 -8 26 -25 28 -25 3z" class="svg-elem-169"></path>
<path d="M384 446 c-10 -8 -15 -20 -11 -30 6 -16 8 -16 32 0 14 9 25 20 25 24
0 15 -28 19 -46 6z" class="svg-elem-170"></path>
<path d="M454 428 c9 -44 22 -56 42 -36 15 14 15 18 -1 42 -25 38 -49 35 -41
-6z" class="svg-elem-171"></path>
<path d="M200 405 c-19 -23 -4 -45 30 -45 22 0 30 5 30 18 0 26 -45 46 -60 27z" class="svg-elem-172"></path>
<path d="M280 386 c0 -13 -3 -31 -6 -40 -4 -11 -1 -16 10 -16 21 0 30 23 22
55 -8 32 -26 33 -26 1z" class="svg-elem-173"></path>
<path d="M410 374 c0 -28 16 -64 29 -64 18 0 20 31 3 60 -21 37 -32 38 -32 4z" class="svg-elem-174"></path>
<path d="M330 371 c-13 -25 1 -34 34 -21 29 11 34 25 10 34 -25 10 -33 7 -44
-13z" class="svg-elem-175"></path>
<path d="M137 326 c-8 -21 17 -38 47 -30 41 10 35 26 -15 38 -19 4 -29 1 -32
-8z" class="svg-elem-176"></path>
<path d="M221 299 c-7 -16 -10 -33 -7 -37 12 -12 41 15 41 38 0 35 -18 34 -34
-1z" class="svg-elem-177"></path>
<path d="M360 303 c0 -16 7 -36 14 -45 12 -17 14 -17 29 0 14 16 15 23 4 45
-16 36 -47 36 -47 0z" class="svg-elem-178"></path>
<path d="M293 313 c-14 -5 -18 -43 -5 -43 13 1 42 27 42 39 0 11 -15 13 -37 4z" class="svg-elem-179"></path>
<path d="M82 268 c-29 -29 2 -53 46 -37 29 11 28 35 0 43 -31 8 -32 8 -46 -6z" class="svg-elem-180"></path>
<path d="M170 256 c0 -9 -5 -25 -12 -36 -16 -25 -5 -35 22 -20 15 8 20 19 18
37 -3 29 -28 45 -28 19z" class="svg-elem-181"></path>
<path d="M317 263 c-12 -11 -8 -58 6 -77 12 -16 14 -16 26 -2 11 13 11 22 -3
51 -18 38 -19 39 -29 28z" class="svg-elem-182"></path>
<path d="M227 243 c-7 -6 -10 -43 -4 -43 13 0 67 33 67 41 0 10 -53 12 -63 2z" class="svg-elem-183"></path>
<path d="M255 190 c-8 -14 4 -68 17 -76 5 -4 17 1 25 9 14 13 14 20 3 46 -12
31 -33 40 -45 21z" class="svg-elem-184"></path>
</g>
</svg>
			</div><?php
			endif;
			
			if( $enumerate > 2 ) :
			?><div class="line-svg3 line">
				<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 227.5 202.8" width="227.5" height="332.8">

<g transform="translate(0.000000,322.000000) scale(0.100000,-0.100000)"
fill="#490000" stroke="none">
<path d="M259 3083 c-13 -34 -8 -57 12 -61 23 -4 46 53 29 73 -18 22 -29 19
-41 -12z"/>
<path d="M321 3032 c-13 -25 -14 -69 -2 -77 6 -3 18 11 27 30 15 33 15 38 1
52 -14 14 -16 13 -26 -5z"/>
<path d="M150 3016 c0 -8 5 -18 10 -21 6 -3 10 -15 10 -26 0 -28 24 -18 28 11
3 15 -3 29 -14 37 -23 17 -34 16 -34 -1z"/>
<path d="M222 2998 c2 -18 11 -24 36 -26 41 -4 41 12 0 32 -40 20 -40 20 -36
-6z"/>
<path d="M88 2992 c-22 -4 -23 -25 -4 -41 19 -16 68 -3 64 17 -3 17 -35 30
-60 24z"/>
<path d="M372 2960 c-6 -11 -12 -31 -12 -45 0 -34 31 -33 48 2 10 23 10 30 -6
45 -17 17 -18 17 -30 -2z"/>
<path d="M210 2952 c0 -18 26 -62 35 -59 15 5 18 36 5 52 -13 16 -40 20 -40 7z"/>
<path d="M280 2931 c0 -17 18 -31 41 -31 15 0 10 22 -8 36 -25 18 -33 17 -33
-5z"/>
<path d="M143 2919 c-20 -20 -4 -40 26 -33 27 7 48 21 40 28 -12 12 -55 16
-66 5z"/>
<path d="M420 2891 c-12 -23 -14 -71 -2 -71 13 0 41 60 36 75 -8 21 -21 19
-34 -4z"/>
<path d="M277 2853 c7 -46 11 -52 24 -33 14 23 6 64 -13 68 -14 3 -16 -3 -11
-35z"/>
<path d="M326 2871 c-11 -17 20 -44 42 -37 29 10 28 24 -4 36 -31 12 -32 12
-38 1z"/>
<path d="M194 2845 c-4 -8 -1 -22 6 -30 15 -19 60 1 60 27 0 23 -58 26 -66 3z"/>
<path d="M460 2814 c-22 -56 3 -76 35 -28 13 20 14 28 4 40 -17 21 -28 17 -39
-12z"/>
<path d="M315 2811 c-3 -5 -1 -12 5 -16 5 -3 10 -15 10 -26 0 -25 17 -24 25 1
10 31 -24 66 -40 41z"/>
<path d="M373 2804 c-7 -20 22 -45 43 -37 20 8 17 19 -11 37 -24 16 -26 16
-32 0z"/>
<path d="M244 2775 c-3 -8 -3 -18 0 -24 8 -13 66 10 66 26 0 18 -59 17 -66 -2z"/>
<path d="M511 2766 c-7 -8 -11 -30 -9 -48 l4 -33 19 38 c13 25 16 40 8 48 -7
7 -14 5 -22 -5z"/>
<path d="M367 2718 c7 -40 9 -42 22 -33 6 3 11 19 11 36 0 22 -5 29 -20 29
-17 0 -19 -5 -13 -32z"/>
<path d="M420 2731 c0 -25 30 -36 49 -17 13 13 11 16 -13 26 -36 13 -36 13
-36 -9z"/>
<path d="M290 2701 c0 -11 5 -23 10 -26 18 -11 50 6 50 26 0 14 -7 19 -30 19
-23 0 -30 -5 -30 -19z"/>
<path d="M552 2698 c-14 -14 -16 -68 -2 -68 15 0 43 48 36 65 -7 18 -18 19
-34 3z"/>
<path d="M414 2668 c3 -13 6 -29 6 -36 0 -7 5 -10 10 -7 17 11 12 65 -6 65
-12 0 -15 -6 -10 -22z"/>
<path d="M462 2668 c2 -15 11 -24 26 -26 26 -4 29 15 5 34 -26 19 -35 17 -31
-8z"/>
<path d="M334 2645 c-10 -26 9 -38 40 -24 32 15 29 33 -7 37 -18 2 -29 -2 -33
-13z"/>
<path d="M590 2631 c-12 -23 -13 -61 -2 -61 11 0 43 61 36 71 -9 15 -23 10
-34 -10z"/>
<path d="M454 2595 c4 -47 13 -54 26 -20 7 20 7 31 -1 41 -19 23 -28 16 -25
-21z"/>
<path d="M504 2615 c-8 -21 4 -35 32 -35 31 0 31 22 -2 37 -20 9 -26 9 -30 -2z"/>
<path d="M386 2587 c-11 -8 -15 -19 -10 -30 7 -20 17 -21 45 -7 23 13 25 36 3
44 -20 8 -17 8 -38 -7z"/>
<path d="M629 2563 c-12 -32 -5 -55 14 -47 17 6 39 52 32 65 -12 18 -36 9 -46
-18z"/>
<path d="M494 2548 c3 -13 6 -29 6 -35 0 -21 18 -15 25 7 7 21 -9 50 -27 50
-6 0 -8 -10 -4 -22z"/>
<path d="M552 2548 c3 -25 38 -33 46 -10 2 6 -3 12 -12 12 -9 0 -16 5 -16 10
0 6 -5 10 -11 10 -6 0 -9 -10 -7 -22z"/>
<path d="M680 2521 c-13 -24 -13 -61 -1 -61 13 0 42 60 35 71 -9 15 -23 10
-34 -10z"/>
<path d="M422 2518 c-8 -8 -8 -15 -1 -24 12 -15 59 4 59 24 0 15 -42 16 -58 0z"/>
<path d="M536 2501 c-4 -5 -2 -12 3 -15 5 -3 7 -16 4 -27 -4 -16 -2 -20 8 -17
17 6 19 60 2 65 -6 2 -14 0 -17 -6z"/>
<path d="M590 2491 c0 -17 6 -21 30 -21 20 0 30 5 30 15 0 8 -6 15 -14 15 -8
0 -21 3 -30 6 -12 4 -16 0 -16 -15z"/>
<path d="M732 2478 c-17 -17 -15 -68 1 -68 17 0 38 45 31 65 -7 18 -16 19 -32
3z"/>
<path d="M470 2462 c-19 -15 -20 -20 -8 -30 17 -14 55 -5 62 14 3 7 -3 18 -13
24 -14 7 -25 5 -41 -8z"/>
<path d="M635 2450 c-3 -5 -2 -16 1 -25 7 -17 45 -17 51 0 4 13 -45 36 -52 25z"/>
<path d="M586 2423 c11 -45 21 -46 26 -3 2 17 -3 25 -15 28 -15 3 -17 -1 -11
-25z"/>
<path d="M774 2418 c-13 -29 -12 -50 1 -55 9 -3 35 49 35 70 0 17 -28 5 -36
-15z"/>
<path d="M518 2409 c-18 -10 -25 -39 -10 -39 18 0 62 26 59 35 -5 14 -29 16
-49 4z"/>
<path d="M629 2395 c-10 -10 3 -66 15 -62 14 5 15 59 0 64 -5 2 -13 1 -15 -2z"/>
<path d="M682 2384 c4 -22 26 -28 48 -15 18 12 13 17 -24 27 -24 6 -27 4 -24
-12z"/>
<path d="M826 2374 c-11 -28 -6 -54 9 -54 18 0 38 37 31 56 -7 19 -32 18 -40
-2z"/>
<path d="M552 2347 c-7 -8 -7 -18 -2 -27 7 -12 12 -12 34 0 14 7 26 19 26 27
0 17 -44 17 -58 0z"/>
<path d="M733 2344 c-8 -22 11 -37 36 -29 28 8 26 17 -5 32 -21 10 -26 9 -31
-3z"/>
<path d="M674 2324 c9 -36 14 -40 27 -27 16 16 7 47 -15 51 -16 3 -18 0 -12
-24z"/>
<path d="M876 2324 c-9 -24 -7 -54 4 -54 12 0 41 55 33 64 -12 11 -31 6 -37
-10z"/>
<path d="M600 2295 c-22 -27 3 -41 34 -19 14 11 26 22 26 27 0 13 -47 7 -60
-8z"/>
<path d="M786 2303 c-16 -16 -4 -33 23 -33 26 0 50 15 40 24 -10 8 -57 15 -63
9z"/>
<path d="M726 2273 c9 -36 12 -39 25 -26 16 16 7 47 -14 51 -15 3 -17 -1 -11
-25z"/>
<path d="M936 2284 c-20 -53 13 -75 38 -25 14 26 14 30 0 35 -24 9 -31 7 -38
-10z"/>
<path d="M643 2244 c-3 -8 -1 -20 4 -25 13 -13 63 9 63 28 0 19 -59 17 -67 -3z"/>
<path d="M837 2253 c-12 -18 11 -36 37 -29 27 7 36 26 12 26 -8 0 -21 3 -29 6
-8 3 -17 1 -20 -3z"/>
<path d="M990 2239 c-12 -21 -7 -49 8 -49 11 0 43 56 35 64 -13 12 -32 6 -43
-15z"/>
<path d="M770 2240 c0 -5 5 -10 10 -10 6 0 10 -7 10 -15 0 -8 4 -15 9 -15 12
0 23 29 15 41 -7 12 -44 11 -44 -1z"/>
<path d="M700 2202 c-19 -15 -20 -20 -7 -30 11 -10 17 -9 27 3 7 8 19 15 26
15 8 0 14 7 14 15 0 20 -33 19 -60 -3z"/>
<path d="M893 2204 c-3 -8 -3 -17 0 -20 9 -10 68 7 65 18 -6 17 -58 19 -65 2z"/>
<path d="M1052 2208 c-20 -20 -15 -58 8 -58 27 0 50 47 29 61 -19 12 -23 11
-37 -3z"/>
<path d="M826 2201 c-4 -5 -1 -13 5 -16 5 -4 8 -14 5 -22 -4 -10 0 -13 12 -11
23 4 23 52 0 56 -9 2 -19 -1 -22 -7z"/>
<path d="M950 2161 c0 -16 6 -21 24 -21 14 0 28 5 31 11 9 13 6 16 -28 24 -23
6 -27 4 -27 -14z"/>
<path d="M1117 2173 c-14 -13 -7 -63 8 -63 8 0 15 9 15 19 0 11 5 23 10 26 6
4 8 11 5 16 -7 11 -29 12 -38 2z"/>
<path d="M750 2155 c-10 -12 -10 -19 -1 -28 9 -9 18 -8 38 5 15 9 29 21 31 27
6 17 -54 13 -68 -4z"/>
<path d="M887 2164 c-3 -4 -3 -12 1 -18 4 -6 7 -15 7 -21 0 -5 7 -10 15 -10
20 0 20 49 0 53 -9 1 -19 0 -23 -4z"/>
<path d="M1010 2119 c0 -21 34 -26 60 -9 19 12 7 22 -30 25 -24 2 -30 -1 -30
-16z"/>
<path d="M1176 2124 c-11 -28 -6 -54 9 -54 18 0 49 45 40 60 -10 16 -42 12
-49 -6z"/>
<path d="M813 2118 c-24 -12 -29 -23 -14 -32 11 -7 71 22 71 35 0 12 -29 10
-57 -3z"/>
<path d="M945 2121 c-3 -5 -1 -12 4 -16 6 -3 8 -12 4 -20 -3 -9 1 -15 10 -15
21 0 33 40 16 51 -18 11 -26 11 -34 0z"/>
<path d="M1072 2083 c4 -20 35 -28 58 -14 18 12 13 17 -28 26 -29 6 -33 5 -30
-12z"/>
<path d="M1240 2081 c-14 -27 -13 -51 3 -51 14 0 48 55 39 64 -11 12 -32 5
-42 -13z"/>
<path d="M873 2078 c-27 -13 -30 -33 -7 -42 19 -7 64 21 64 40 0 16 -26 17
-57 2z"/>
<path d="M1004 2078 c3 -7 9 -21 12 -31 4 -10 12 -16 18 -14 17 6 20 38 4 48
-20 13 -40 11 -34 -3z"/>
<path d="M1312 2058 c-20 -20 -15 -58 8 -58 27 0 50 47 29 61 -19 12 -23 11
-37 -3z"/>
<path d="M1134 2048 c-4 -5 -1 -15 5 -21 12 -12 64 1 65 17 1 12 -63 16 -70 4z"/>
<path d="M933 2038 c-23 -11 -32 -38 -13 -38 19 0 79 34 74 42 -7 11 -34 9
-61 -4z"/>
<path d="M1064 2039 c-4 -7 -2 -15 4 -17 7 -2 12 -10 12 -19 0 -8 6 -13 13
-10 18 6 15 51 -5 55 -9 2 -20 -3 -24 -9z"/>
<path d="M1376 2014 c-10 -27 -7 -54 7 -54 16 0 40 47 32 61 -10 14 -32 11
-39 -7z"/>
<path d="M1195 2010 c-8 -12 10 -30 31 -30 5 0 19 7 30 15 14 11 15 14 4 15
-8 0 -25 3 -36 6 -12 3 -25 0 -29 -6z"/>
<path d="M992 1999 c-26 -10 -25 -32 2 -37 19 -4 66 23 66 38 0 12 -37 12 -68
-1z"/>
<path d="M1127 1995 c-4 -8 -2 -15 3 -15 6 0 10 -7 10 -16 0 -9 6 -14 13 -11
18 6 15 51 -4 55 -9 2 -19 -4 -22 -13z"/>
<path d="M1269 1979 c-17 -10 -1 -29 25 -29 12 0 31 6 41 14 17 12 16 14 -18
18 -21 2 -42 1 -48 -3z"/>
<path d="M1447 1983 c-4 -3 -7 -19 -7 -35 0 -37 32 -38 49 -1 10 21 9 28 -1
34 -16 11 -32 11 -41 2z"/>
<path d="M1063 1963 c-15 -6 -18 -33 -3 -33 16 0 60 23 60 32 0 9 -37 10 -57
1z"/>
<path d="M1190 1960 c0 -5 5 -10 11 -10 6 0 9 -7 6 -15 -9 -22 14 -30 29 -10
10 14 11 22 3 32 -13 15 -49 18 -49 3z"/>
<path d="M1516 1938 c-11 -15 -12 -26 -5 -40 13 -24 16 -23 34 12 18 36 18 37
0 44 -8 3 -21 -4 -29 -16z"/>
<path d="M1337 1943 c-12 -18 10 -34 37 -27 32 8 44 24 17 24 -10 0 -26 3 -34
6 -8 3 -17 1 -20 -3z"/>
<path d="M1260 1926 c0 -9 5 -16 10 -16 6 0 10 -7 10 -16 0 -9 6 -14 13 -12
15 5 23 48 9 48 -6 0 -17 3 -26 6 -11 4 -16 1 -16 -10z"/>
<path d="M1121 1917 c-28 -14 -29 -31 -2 -35 21 -3 71 24 71 39 0 13 -41 11
-69 -4z"/>
<path d="M1406 1905 c-3 -9 1 -18 8 -21 23 -9 59 0 64 15 3 10 -1 12 -15 9
-11 -3 -27 -2 -36 3 -10 6 -17 4 -21 -6z"/>
<path d="M1582 1895 c-17 -37 -3 -66 23 -47 28 20 37 42 25 57 -18 22 -35 18
-48 -10z"/>
<path d="M1213 1893 c-24 -5 -49 -30 -40 -39 8 -9 82 22 80 32 -2 11 -12 12
-40 7z"/>
<path d="M1330 1891 c0 -6 5 -13 10 -16 6 -4 8 -10 5 -15 -3 -5 0 -12 6 -16
15 -9 39 23 32 42 -6 15 -53 20 -53 5z"/>
<path d="M1476 1873 c-17 -17 -4 -33 29 -33 25 0 35 4 35 16 0 8 -4 12 -10 9
-5 -3 -18 -1 -28 4 -11 6 -22 7 -26 4z"/>
<path d="M1402 1858 c-7 -7 -3 -17 9 -29 26 -26 39 -24 39 5 0 26 -31 41 -48
24z"/>
<path d="M1652 1858 c-15 -15 -16 -45 -1 -54 14 -8 26 5 34 39 8 29 -10 38
-33 15z"/>
<path d="M1251 1843 c-22 -15 -23 -17 -7 -29 14 -10 23 -9 47 4 16 10 29 23
29 30 0 17 -41 15 -69 -5z"/>
<path d="M1546 1833 c-23 -24 13 -46 52 -32 27 10 30 33 3 26 -10 -2 -25 -1
-33 4 -8 5 -18 6 -22 2z"/>
<path d="M1722 1818 c-18 -18 -15 -58 4 -58 16 0 43 26 44 42 0 15 -37 27 -48
16z"/>
<path d="M1314 1806 c-15 -12 -16 -17 -7 -27 10 -10 20 -9 48 7 19 10 35 22
35 26 0 14 -55 9 -76 -6z"/>
<path d="M1465 1810 c-3 -5 -1 -10 4 -10 6 0 11 -9 11 -20 0 -11 6 -20 14 -20
16 0 31 34 21 50 -8 13 -42 13 -50 0z"/>
<path d="M1413 1783 c-31 -6 -49 -31 -35 -45 9 -9 21 -8 48 5 49 24 40 50 -13
40z"/>
<path d="M1606 1781 c-9 -14 31 -33 54 -26 22 7 27 25 8 25 -7 0 -23 3 -34 6
-12 3 -25 1 -28 -5z"/>
<path d="M1530 1770 c0 -5 5 -10 10 -10 6 0 10 -7 10 -15 0 -16 25 -21 34 -6
11 18 -6 41 -30 41 -13 0 -24 -4 -24 -10z"/>
<path d="M1780 1761 c-12 -24 -13 -48 -1 -55 10 -7 52 59 44 68 -12 12 -33 5
-43 -13z"/>
<path d="M1675 1740 c-10 -17 5 -30 35 -30 25 0 49 15 39 24 -12 10 -69 14
-74 6z"/>
<path d="M1444 1723 c-17 -17 -17 -18 3 -21 20 -3 83 22 83 33 0 13 -71 3 -86
-12z"/>
<path d="M1600 1731 c0 -5 4 -12 10 -16 5 -3 6 -13 3 -21 -4 -12 -1 -15 13
-12 29 5 26 52 -3 56 -13 2 -23 -1 -23 -7z"/>
<path d="M1841 1712 c-6 -10 -7 -28 -4 -40 4 -17 9 -20 23 -12 24 13 33 39 19
56 -15 19 -26 18 -38 -4z"/>
<path d="M1514 1685 c-19 -15 -19 -15 0 -30 17 -13 22 -12 47 2 16 10 29 23
29 30 0 18 -52 16 -76 -2z"/>
<path d="M1666 1684 c-3 -8 -2 -14 3 -14 5 0 11 -9 14 -20 3 -11 10 -20 15
-20 12 0 22 34 13 47 -11 18 -39 22 -45 7z"/>
<path d="M1737 1694 c-4 -4 -7 -11 -7 -16 0 -12 42 -27 58 -21 17 7 15 33 -2
33 -8 0 -21 2 -28 5 -8 3 -17 2 -21 -1z"/>
<path d="M1898 1656 c-11 -25 -6 -56 9 -56 4 0 15 13 24 29 12 21 14 32 6 40
-17 17 -26 13 -39 -13z"/>
<path d="M1604 1650 c-24 -10 -39 -28 -30 -37 10 -10 87 19 83 31 -5 15 -27
17 -53 6z"/>
<path d="M1737 1642 c-9 -14 5 -62 18 -62 12 0 25 21 25 40 0 13 -38 32 -43
22z"/>
<path d="M1800 1632 c0 -21 22 -31 53 -24 23 6 22 32 -2 32 -11 0 -26 3 -35 6
-11 4 -16 0 -16 -14z"/>
<path d="M1962 1608 c-19 -19 -15 -68 6 -68 23 0 46 49 31 67 -14 16 -22 16
-37 1z"/>
<path d="M1642 1594 c-16 -12 -16 -14 1 -31 16 -16 19 -16 45 -1 15 9 27 23
27 30 0 17 -50 19 -73 2z"/>
<path d="M1862 1592 c-9 -3 -9 -9 -2 -23 12 -21 60 -27 60 -6 0 14 -41 35 -58
29z"/>
<path d="M1795 1568 c10 -33 23 -44 36 -31 17 17 6 48 -20 51 -20 3 -22 1 -16
-20z"/>
<path d="M1735 1553 c-32 -8 -47 -24 -35 -38 8 -10 18 -9 45 4 53 25 46 48
-10 34z"/>
<path d="M2010 1541 c-14 -27 -13 -61 3 -61 15 0 41 56 32 70 -10 16 -23 12
-35 -9z"/>
<path d="M1855 1508 c9 -40 12 -45 26 -31 16 16 7 57 -14 61 -17 3 -18 -1 -12
-30z"/>
<path d="M1916 1532 c-3 -6 -3 -17 0 -26 8 -21 64 -22 64 -1 0 8 -8 15 -18 15
-10 0 -23 5 -29 11 -7 7 -13 7 -17 1z"/>
<path d="M1765 1485 c-17 -14 -18 -17 -3 -31 14 -14 18 -14 47 0 17 9 31 23
31 31 0 20 -49 19 -75 0z"/>
<path d="M2059 1463 c-5 -14 -8 -32 -5 -40 8 -21 36 -15 36 7 0 11 5 20 10 20
7 0 7 6 0 20 -15 27 -29 25 -41 -7z"/>
<path d="M1900 1466 c0 -15 21 -56 29 -56 13 0 22 27 15 45 -5 13 -44 22 -44
11z"/>
<path d="M1965 1461 c-7 -13 34 -41 51 -34 22 8 17 23 -12 33 -31 12 -31 12
-39 1z"/>
<path d="M1821 1431 c-8 -5 -11 -16 -8 -25 7 -18 23 -21 32 -6 3 6 15 10 26
10 10 0 19 7 19 15 0 17 -46 21 -69 6z"/>
<path d="M1955 1411 c-3 -6 -3 -17 2 -23 4 -7 6 -21 4 -32 -3 -22 18 -18 33 7
8 12 8 22 0 34 -13 21 -30 27 -39 14z"/>
<path d="M2106 1404 c-9 -24 -7 -64 3 -64 13 0 42 60 35 71 -9 14 -31 10 -38
-7z"/>
<path d="M2022 1389 c2 -18 10 -25 31 -27 31 -4 39 22 10 32 -10 3 -24 9 -31
12 -10 4 -13 -1 -10 -17z"/>
<path d="M1870 1365 c-18 -21 5 -48 34 -39 25 7 48 33 40 45 -9 15 -61 10 -74
-6z"/>
<path d="M2161 1346 c-7 -8 -15 -31 -18 -51 -4 -27 -3 -35 8 -33 32 7 49 56
30 86 -6 10 -10 10 -20 -2z"/>
<path d="M2007 1343 c-10 -15 5 -63 20 -63 10 0 13 9 11 32 -3 30 -21 48 -31
31z"/>
<path d="M2060 1320 c0 -24 37 -47 53 -31 8 8 5 17 -11 31 -27 25 -42 25 -42
0z"/>
<path d="M1932 1309 c-24 -9 -26 -16 -12 -39 7 -12 12 -12 22 -2 6 6 20 12 30
12 23 0 23 26 0 32 -10 3 -28 1 -40 -3z"/>
<path d="M2053 1240 c2 -48 17 -56 30 -17 6 19 5 32 -3 42 -21 25 -30 17 -27
-25z"/>
<path d="M2104 1255 c-8 -20 13 -45 37 -45 26 0 23 22 -6 43 -22 16 -26 16
-31 2z"/>
<path d="M2190 1251 c-12 -24 -13 -58 -2 -65 11 -7 40 55 35 72 -7 18 -21 15
-33 -7z"/>
<path d="M1978 1239 c-37 -21 -11 -65 28 -47 28 13 39 38 22 50 -17 10 -29 10
-50 -3z"/>
<path d="M2096 1163 c10 -59 25 -60 27 -2 2 25 -3 34 -16 37 -16 3 -17 -1 -11
-35z"/>
<path d="M2152 1169 c3 -23 33 -48 44 -37 7 7 -27 57 -39 58 -5 0 -7 -10 -5
-21z"/>
<path d="M2226 1174 c-9 -24 -7 -74 3 -74 5 0 16 11 25 25 13 19 14 30 6 45
-13 24 -26 26 -34 4z"/>
<path d="M2006 1162 c-3 -5 -3 -18 1 -30 4 -16 9 -19 22 -12 9 5 24 11 34 14
32 10 20 36 -17 36 -19 0 -37 -4 -40 -8z"/>
<path d="M2132 1085 c0 -31 4 -45 11 -42 7 2 12 21 12 42 0 21 -5 40 -12 42
-7 3 -11 -11 -11 -42z"/>
<path d="M2180 1086 c0 -26 24 -51 40 -41 15 9 12 23 -10 45 -26 26 -30 25
-30 -4z"/>
<path d="M2260 1090 c-6 -12 -10 -35 -8 -53 l3 -32 22 38 c21 35 22 67 2 67
-4 0 -13 -9 -19 -20z"/>
<path d="M2054 1086 c-17 -13 -12 -56 7 -56 22 0 49 22 49 39 0 23 -33 33 -56
17z"/>
<path d="M2164 1003 c1 -21 6 -39 11 -40 14 -4 12 70 -2 74 -7 3 -10 -9 -9
-34z"/>
<path d="M2212 993 c2 -20 9 -29 26 -31 26 -4 28 10 5 38 -24 28 -35 25 -31
-7z"/>
<path d="M2291 1001 c-13 -24 -14 -68 -2 -75 10 -6 31 37 31 64 0 27 -17 34
-29 11z"/>
<path d="M2082 998 c-6 -8 -8 -19 -4 -26 10 -16 67 0 67 19 0 18 -49 24 -63 7z"/>
<path d="M2193 910 c0 -45 13 -52 27 -15 11 28 4 55 -15 55 -8 0 -12 -15 -12
-40z"/>
<path d="M2244 925 c-9 -21 7 -49 30 -53 22 -5 20 14 -4 45 -18 23 -20 23 -26
8z"/>
<path d="M2115 920 c-11 -17 6 -62 22 -56 8 3 18 6 23 6 16 0 23 42 9 51 -19
12 -46 11 -54 -1z"/>
<path d="M2321 916 c-7 -8 -11 -32 -9 -53 l3 -38 18 39 c19 43 11 80 -12 52z"/>
<path d="M2229 870 c0 -3 -2 -24 -4 -48 -4 -49 13 -53 28 -8 7 22 6 32 -7 44
-9 9 -16 14 -17 12z"/>
<path d="M2277 843 c-14 -14 -6 -53 13 -63 16 -8 20 -8 20 4 0 21 -26 67 -33
59z"/>
<path d="M2147 833 c-4 -3 -7 -17 -7 -31 0 -19 4 -23 18 -17 9 4 24 8 31 9 21
4 26 27 10 37 -17 10 -43 12 -52 2z"/>
<path d="M2352 827 c-19 -22 -29 -91 -13 -86 25 9 45 56 35 79 -9 19 -11 20
-22 7z"/>
<path d="M2250 755 c0 -17 -3 -41 -7 -54 -10 -38 20 -21 31 18 7 25 6 36 -7
49 -16 15 -17 14 -17 -13z"/>
<path d="M2172 737 c-15 -18 -3 -60 15 -53 8 3 19 6 23 6 5 0 14 10 21 21 9
17 8 23 -2 30 -20 13 -45 11 -57 -4z"/>
<path d="M2294 735 c-8 -19 5 -46 24 -53 22 -7 24 27 3 49 -19 21 -21 21 -27
4z"/>
<path d="M2364 713 c-3 -16 -7 -33 -9 -40 -2 -7 0 -15 5 -18 12 -7 40 53 33
71 -8 23 -22 16 -29 -13z"/>
<path d="M2272 635 c0 -48 14 -61 24 -21 7 31 2 58 -12 63 -7 2 -11 -14 -12
-42z"/>
<path d="M2195 640 c-9 -28 0 -38 30 -32 32 6 40 19 25 37 -18 21 -48 18 -55
-5z"/>
<path d="M2320 630 c0 -16 2 -30 4 -30 2 0 11 -3 20 -6 12 -4 16 0 16 15 0 12
-4 21 -10 21 -5 0 -10 7 -10 15 0 8 -4 15 -10 15 -5 0 -10 -13 -10 -30z"/>
<path d="M2392 633 c-16 -30 -16 -86 1 -81 20 7 32 54 20 80 l-10 23 -11 -22z"/>
<path d="M2300 588 c-7 -35 -7 -98 0 -98 13 0 32 64 24 83 -5 14 -23 24 -24
15z"/>
<path d="M2344 545 c-7 -29 16 -62 35 -51 14 9 14 36 1 36 -5 0 -10 6 -10 14
0 27 -19 27 -26 1z"/>
<path d="M2221 546 c-7 -8 -10 -24 -6 -36 11 -35 69 -7 62 30 -3 20 -41 24
-56 6z"/>
<path d="M2410 515 c-19 -58 -8 -76 18 -31 22 37 23 66 3 66 -5 0 -15 -16 -21
-35z"/>
<path d="M2318 450 c-4 -49 8 -62 22 -24 12 32 10 56 -6 61 -7 2 -13 -12 -16
-37z"/>
<path d="M2240 450 c-15 -28 -4 -41 28 -33 33 8 44 23 30 40 -16 19 -46 16
-58 -7z"/>
<path d="M2367 464 c-12 -13 -8 -51 8 -64 24 -20 44 4 23 27 -8 10 -17 24 -19
31 -3 7 -8 10 -12 6z"/>
<path d="M2452 457 c-17 -20 -27 -83 -14 -91 19 -11 43 41 34 75 -6 27 -9 29
-20 16z"/>
<path d="M2340 346 c0 -49 16 -62 26 -22 8 32 2 58 -13 64 -9 2 -13 -10 -13
-42z"/>
<path d="M2277 369 c-17 -10 -24 -54 -9 -62 15 -9 52 13 52 31 0 28 -21 43
-43 31z"/>
<path d="M2396 372 c-15 -14 -5 -51 15 -57 36 -12 46 11 16 39 -14 13 -28 21
-31 18z"/>
<path d="M2466 344 c-9 -23 -7 -64 3 -64 12 0 34 57 26 69 -9 16 -22 13 -29
-5z"/>
<path d="M2379 309 c0 -2 -2 -26 -5 -53 -3 -43 -1 -48 11 -35 23 23 28 64 11
78 -9 8 -16 12 -17 10z"/>
<path d="M2425 270 c-7 -23 9 -50 31 -50 25 0 26 21 1 46 -25 25 -25 25 -32 4z"/>
<path d="M2284 255 c-8 -33 -4 -37 34 -29 54 11 50 53 -5 54 -16 0 -25 -8 -29
-25z"/>
</g>
</svg>

			</div><?php
			endif;
			
			if( $enumerate > 3 ) :
			?><div class="line-svg4 line">
       <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 240.8 370.7" width="240.8" height="370.7">

<g transform="translate(0.000000,322.000000) scale(0.100000,-0.100000)"
fill="#490000" stroke="none">
<path d="M2373 2966 c4 -52 9 -62 26 -42 14 16 5 60 -15 76 -11 10 -13 4 -11
-34z"/>
<path d="M2280 2987 c0 -42 33 -61 68 -39 15 10 6 42 -12 42 -6 0 -21 3 -33 6
-17 5 -23 2 -23 -9z"/>
<path d="M2430 2985 c-6 -8 -9 -23 -5 -35 7 -21 7 -21 32 4 25 25 24 46 -1 46
-8 0 -19 -7 -26 -15z"/>
<path d="M2460 2913 c0 -39 16 -61 31 -46 9 9 9 19 -1 42 -16 38 -30 40 -30 4z"/>
<path d="M2266 2913 c-13 -13 -5 -53 13 -62 22 -12 45 8 39 35 -3 17 -42 37
-52 27z"/>
<path d="M2340 2874 c0 -32 4 -44 13 -42 15 6 21 32 13 64 -10 40 -26 27 -26
-22z"/>
<path d="M2403 2903 c-13 -5 -18 -45 -7 -55 3 -3 17 5 31 18 33 31 18 55 -24
37z"/>
<path d="M2435 2851 c-10 -17 3 -77 20 -91 12 -10 15 -10 15 1 0 8 2 23 5 34
6 25 -29 74 -40 56z"/>
<path d="M2372 2818 c-15 -15 -16 -54 -2 -63 6 -3 10 -1 10 6 0 7 7 20 16 30
25 27 2 53 -24 27z"/>
<path d="M2319 2816 c-3 -3 -3 -23 -1 -46 5 -49 28 -49 25 0 -1 31 -14 55 -24
46z"/>
<path d="M2235 2800 c-10 -15 14 -50 34 -50 23 0 42 22 33 36 -10 16 -60 26
-67 14z"/>
<path d="M2400 2751 c0 -27 21 -81 31 -81 20 0 19 29 -1 64 -25 41 -30 44 -30
17z"/>
<path d="M2215 2710 c-8 -27 12 -52 39 -48 38 5 30 49 -11 62 -16 5 -23 2 -28
-14z"/>
<path d="M2294 2683 c4 -49 19 -67 30 -37 8 20 -11 84 -24 84 -5 0 -8 -21 -6
-47z"/>
<path d="M2350 2715 c-14 -17 -5 -69 10 -60 6 3 10 12 10 20 0 7 5 15 12 17
13 5 4 38 -10 38 -5 0 -15 -7 -22 -15z"/>
<path d="M2380 2637 c0 -18 6 -42 14 -53 14 -18 15 -18 21 9 8 30 -7 77 -25
77 -5 0 -10 -15 -10 -33z"/>
<path d="M2272 2585 c1 -28 5 -44 12 -42 14 5 19 32 12 63 -10 40 -24 27 -24
-21z"/>
<path d="M2333 2623 c-15 -6 -18 -63 -3 -63 6 0 10 7 10 15 0 8 5 15 10 15 6
0 10 9 10 20 0 20 -5 23 -27 13z"/>
<path d="M2194 2609 c-10 -17 7 -49 25 -49 22 0 45 25 37 38 -8 13 -55 21 -62
11z"/>
<path d="M2357 2564 c-3 -3 -4 -11 -2 -17 2 -7 6 -24 9 -39 4 -16 10 -28 15
-28 17 0 20 30 5 59 -17 33 -18 34 -27 25z"/>
<path d="M2167 2518 c-9 -31 14 -52 47 -44 14 3 26 10 26 14 0 15 -25 40 -46
46 -17 5 -23 1 -27 -16z"/>
<path d="M2243 2519 c4 -13 7 -37 7 -54 0 -27 1 -28 17 -13 13 13 14 24 7 49
-11 39 -41 56 -31 18z"/>
<path d="M2302 2528 c-14 -14 -16 -44 -4 -52 13 -8 44 34 38 50 -7 17 -18 18
-34 2z"/>
<path d="M2333 2443 c4 -20 13 -43 21 -51 13 -13 16 -12 21 10 4 17 1 35 -10
52 -25 38 -39 33 -32 -11z"/>
<path d="M2288 2439 c-18 -10 -25 -54 -10 -63 9 -5 35 49 30 63 -2 6 -10 6
-20 0z"/>
<path d="M2140 2417 c0 -32 13 -41 46 -33 27 7 30 37 4 42 -8 1 -23 5 -32 9
-14 6 -18 2 -18 -18z"/>
<path d="M2224 2403 c2 -40 15 -54 29 -31 10 15 -8 68 -22 68 -5 0 -8 -17 -7
-37z"/>
<path d="M2310 2351 c0 -41 23 -74 33 -47 6 15 -18 86 -28 86 -3 0 -5 -17 -5
-39z"/>
<path d="M2116 2334 c-9 -34 5 -48 38 -40 39 10 32 47 -10 60 -18 5 -23 2 -28
-20z"/>
<path d="M2193 2310 c0 -25 4 -40 12 -40 19 0 26 27 15 55 -14 37 -27 30 -27
-15z"/>
<path d="M2252 2338 c-13 -13 -16 -41 -6 -51 8 -7 44 36 44 52 0 15 -23 14
-38 -1z"/>
<path d="M2287 2294 c-19 -19 3 -101 24 -89 5 4 9 16 9 28 -1 28 -24 70 -33
61z"/>
<path d="M2169 2270 c-8 -38 -5 -90 4 -87 16 5 21 67 8 80 -6 6 -11 9 -12 7z"/>
<path d="M2077 2246 c-7 -18 12 -36 39 -36 25 0 41 17 28 30 -18 16 -62 20
-67 6z"/>
<path d="M2217 2253 c-10 -9 -9 -53 1 -53 10 0 42 38 42 50 0 11 -33 14 -43 3z"/>
<path d="M2250 2179 c0 -52 30 -89 44 -54 5 13 -29 85 -40 85 -2 0 -4 -14 -4
-31z"/>
<path d="M2044 2168 c-8 -26 17 -48 46 -41 26 7 26 39 1 53 -29 15 -39 12 -47
-12z"/>
<path d="M2132 2135 c0 -31 4 -45 11 -42 7 2 12 21 12 42 0 21 -5 40 -12 42
-7 3 -11 -11 -11 -42z"/>
<path d="M2192 2168 c-12 -12 -17 -58 -7 -58 14 0 46 43 41 56 -7 17 -18 18
-34 2z"/>
<path d="M2220 2091 c0 -58 20 -78 40 -41 8 15 7 26 -6 45 -22 33 -34 32 -34
-4z"/>
<path d="M2007 2088 c-8 -30 -1 -38 39 -38 37 0 49 26 17 36 -10 3 -25 9 -34
14 -13 7 -18 4 -22 -12z"/>
<path d="M2100 2083 c0 -10 -3 -28 -6 -40 -5 -17 -2 -23 9 -23 23 0 29 16 22
50 -7 32 -25 41 -25 13z"/>
<path d="M2162 2078 c-12 -12 -17 -48 -6 -48 8 0 43 43 44 53 0 11 -25 8 -38
-5z"/>
<path d="M1972 2028 c-18 -18 -14 -36 8 -48 20 -11 60 -5 60 8 -1 27 -52 56
-68 40z"/>
<path d="M2184 2026 c-8 -21 6 -68 22 -73 20 -7 22 22 4 57 -16 30 -19 33 -26
16z"/>
<path d="M2057 2023 c-8 -15 -6 -83 2 -83 18 0 32 29 25 54 -7 28 -20 41 -27
29z"/>
<path d="M2110 1995 c-7 -8 -10 -22 -6 -30 5 -14 9 -14 31 2 13 10 25 24 25
31 0 17 -35 15 -50 -3z"/>
<path d="M1916 1943 c-10 -25 10 -37 57 -34 24 1 22 31 -2 31 -11 0 -23 5 -26
10 -9 15 -22 12 -29 -7z"/>
<path d="M2144 1922 c3 -20 12 -42 20 -50 13 -13 16 -12 22 12 8 32 -11 73
-33 73 -12 0 -14 -8 -9 -35z"/>
<path d="M2007 1913 c-3 -16 -2 -32 3 -37 14 -14 30 4 30 35 0 37 -26 39 -33
2z"/>
<path d="M2078 1929 c-19 -11 -25 -49 -8 -49 18 0 53 38 45 49 -8 13 -15 13
-37 0z"/>
<path d="M1870 1885 c-18 -21 4 -45 41 -45 33 0 43 11 26 33 -19 23 -52 30
-67 12z"/>
<path d="M1962 1863 c1 -10 -1 -24 -6 -31 -13 -21 10 -38 29 -22 18 15 20 41
3 58 -17 17 -30 15 -26 -5z"/>
<path d="M2100 1856 c0 -34 10 -56 25 -56 23 0 25 16 9 49 -18 37 -34 40 -34
7z"/>
<path d="M2027 1853 c-13 -12 -8 -45 6 -39 6 3 20 9 30 12 25 9 21 34 -6 34
-13 0 -27 -3 -30 -7z"/>
<path d="M1813 1814 c-7 -20 13 -34 50 -34 17 0 27 5 27 15 0 8 -9 15 -19 15
-11 0 -23 5 -26 10 -9 15 -25 12 -32 -6z"/>
<path d="M1910 1784 c-13 -34 -13 -34 9 -34 21 0 33 22 25 45 -9 23 -23 18
-34 -11z"/>
<path d="M2054 1797 c-6 -17 12 -67 25 -67 6 0 15 9 21 20 7 14 7 20 0 20 -5
0 -10 9 -10 20 0 22 -28 28 -36 7z"/>
<path d="M1980 1783 c-29 -20 -12 -37 23 -24 15 6 27 15 27 20 0 17 -28 19
-50 4z"/>
<path d="M1760 1765 c-11 -13 -10 -18 6 -30 10 -8 31 -15 47 -15 37 0 35 25
-3 45 -36 18 -35 18 -50 0z"/>
<path d="M1856 1719 c-7 -37 -3 -44 19 -35 11 4 15 15 13 33 -4 38 -24 39 -32
2z"/>
<path d="M2000 1717 c0 -34 25 -65 41 -50 9 9 8 18 -2 42 -16 36 -39 41 -39 8z"/>
<path d="M1916 1714 c-8 -22 3 -39 17 -25 6 6 19 11 29 11 10 0 18 7 18 15 0
21 -56 20 -64 -1z"/>
<path d="M1700 1705 c-13 -16 4 -30 48 -40 44 -9 42 15 -3 36 -27 13 -37 14
-45 4z"/>
<path d="M1800 1665 c-14 -36 -13 -37 13 -33 16 2 22 10 22 27 0 34 -23 38
-35 6z"/>
<path d="M1950 1651 c0 -38 25 -60 46 -40 12 12 12 19 2 42 -18 37 -48 36 -48
-2z"/>
<path d="M1640 1655 c-17 -20 -3 -35 38 -41 40 -7 52 14 21 37 -29 23 -43 24
-59 4z"/>
<path d="M1860 1651 c-7 -14 -7 -20 2 -23 17 -6 58 15 58 30 0 20 -48 14 -60
-7z"/>
<path d="M1737 1613 c-7 -35 4 -47 27 -30 13 10 16 20 12 35 -10 31 -33 27
-39 -5z"/>
<path d="M1818 1612 c-10 -2 -18 -13 -18 -24 0 -14 5 -18 16 -14 9 3 24 6 35
6 10 0 19 6 19 14 0 15 -25 24 -52 18z"/>
<path d="M1897 1613 c-11 -11 -8 -38 7 -58 11 -16 16 -17 29 -7 14 12 14 16
-1 43 -17 30 -24 34 -35 22z"/>
<path d="M1572 1598 c6 -18 56 -41 74 -34 23 9 16 21 -19 34 -43 15 -60 15
-55 0z"/>
<path d="M1683 1570 c-3 -11 -9 -20 -14 -20 -5 0 -6 -6 -3 -14 6 -15 34 -11
45 7 9 13 -1 47 -13 47 -5 0 -12 -9 -15 -20z"/>
<path d="M1514 1565 c-19 -15 -19 -15 0 -30 24 -18 76 -20 76 -2 0 7 -13 20
-29 30 -25 14 -30 15 -47 2z"/>
<path d="M1752 1559 c-23 -9 -26 -35 -4 -33 7 1 21 2 32 3 22 1 27 26 8 34 -7
2 -24 0 -36 -4z"/>
<path d="M1836 1548 c-5 -22 9 -58 23 -58 19 0 32 29 22 48 -16 29 -38 34 -45
10z"/>
<path d="M1613 1526 c3 -8 2 -18 -3 -21 -18 -11 -10 -26 13 -23 29 4 32 51 3
56 -14 3 -17 0 -13 -12z"/>
<path d="M1436 1505 c7 -18 42 -28 75 -23 23 3 23 4 -8 21 -41 22 -75 23 -67
2z"/>
<path d="M1777 1513 c-22 -21 9 -80 36 -70 15 6 15 10 -4 42 -23 38 -23 38
-32 28z"/>
<path d="M1675 1500 c-4 -7 -3 -15 1 -20 13 -12 76 0 71 14 -5 15 -63 20 -72
6z"/>
<path d="M1374 1479 c-9 -16 16 -37 50 -41 40 -4 44 17 7 36 -36 19 -47 20
-57 5z"/>
<path d="M1550 1475 c0 -8 -4 -15 -10 -15 -5 0 -10 -4 -10 -10 0 -5 11 -10 24
-10 24 0 41 23 30 41 -9 15 -34 10 -34 -6z"/>
<path d="M1615 1457 c-24 -18 -6 -29 34 -21 34 7 40 18 15 28 -22 9 -28 8 -49
-7z"/>
<path d="M1480 1440 c0 -11 -5 -20 -11 -20 -5 0 -7 -4 -4 -10 8 -13 42 -13 50
0 10 16 -5 50 -21 50 -8 0 -14 -9 -14 -20z"/>
<path d="M1710 1436 c0 -33 22 -49 45 -33 15 12 16 16 4 35 -19 30 -49 29 -49
-2z"/>
<path d="M1304 1438 c-10 -15 24 -38 58 -38 36 0 35 11 -3 33 -36 20 -45 21
-55 5z"/>
<path d="M1557 1422 c-11 -2 -17 -10 -14 -20 2 -10 10 -15 18 -13 8 2 24 3 37
2 14 0 22 4 20 11 -5 14 -38 25 -61 20z"/>
<path d="M1244 1406 c-16 -12 -15 -14 7 -29 28 -20 69 -22 69 -4 0 6 -13 19
-29 29 -24 13 -33 14 -47 4z"/>
<path d="M1643 1404 c-8 -20 8 -48 31 -52 18 -4 20 6 6 42 -11 30 -28 34 -37
10z"/>
<path d="M1409 1390 c-20 -21 -7 -40 22 -33 12 3 19 14 19 29 0 28 -18 30 -41
4z"/>
<path d="M1349 1375 c-1 -3 -2 -9 -3 -14 0 -5 -4 -13 -8 -17 -15 -14 -8 -24
16 -24 28 0 37 17 24 43 -8 16 -26 23 -29 12z"/>
<path d="M1472 1363 c2 -10 11 -16 19 -14 8 2 22 4 32 5 35 1 17 26 -19 26
-29 0 -35 -3 -32 -17z"/>
<path d="M1576 1365 c-7 -19 13 -65 29 -65 7 0 18 7 25 15 10 12 10 18 -1 33
-28 35 -44 40 -53 17z"/>
<path d="M1170 1361 c0 -13 22 -27 52 -35 42 -10 43 12 2 29 -42 17 -54 19
-54 6z"/>
<path d="M1096 1331 c-9 -14 19 -31 58 -38 42 -7 47 7 11 31 -27 18 -61 21
-69 7z"/>
<path d="M1280 1326 c0 -9 -4 -16 -10 -16 -5 0 -10 -7 -10 -16 0 -11 5 -14 16
-10 9 3 20 6 26 6 14 0 6 43 -9 48 -7 2 -13 -3 -13 -12z"/>
<path d="M1407 1333 c-9 -15 7 -33 22 -24 7 5 22 6 33 3 15 -3 19 -1 16 9 -5
16 -63 25 -71 12z"/>
<path d="M1510 1321 c-13 -24 17 -66 38 -52 12 7 11 14 -2 40 -19 36 -22 37
-36 12z"/>
<path d="M1207 1304 c-3 -3 -3 -12 0 -20 3 -8 0 -14 -6 -14 -6 0 -11 -4 -11
-10 0 -14 33 -13 48 2 7 7 8 17 1 30 -10 18 -21 23 -32 12z"/>
<path d="M1337 1295 c-8 -20 3 -25 43 -16 l35 8 -28 12 c-37 14 -44 14 -50 -4z"/>
<path d="M1442 1268 c3 -34 22 -45 46 -30 19 13 -5 62 -30 62 -16 0 -19 -6
-16 -32z"/>
<path d="M1050 1276 c0 -15 21 -26 51 -26 27 0 24 15 -6 28 -34 16 -45 15 -45
-2z"/>
<path d="M1140 1257 c0 -9 -4 -17 -10 -19 -5 -2 -6 -9 -1 -17 13 -21 43 -5 39
21 -3 24 -28 38 -28 15z"/>
<path d="M1264 1259 c-10 -17 12 -26 53 -21 34 4 35 6 18 18 -23 17 -61 18
-71 3z"/>
<path d="M974 1249 c-10 -16 8 -29 49 -36 42 -7 49 7 15 31 -26 19 -54 21 -64
5z"/>
<path d="M1370 1241 c0 -30 11 -51 25 -51 21 0 26 16 14 44 -14 30 -39 35 -39
7z"/>
<path d="M1200 1230 c-25 -15 2 -31 40 -24 30 7 32 8 15 21 -22 15 -34 16 -55
3z"/>
<path d="M1080 1217 c0 -9 -6 -17 -12 -20 -10 -3 -10 -7 -1 -17 17 -19 45 -4
41 22 -3 24 -28 38 -28 15z"/>
<path d="M910 1206 c0 -18 55 -40 77 -31 15 5 12 10 -17 25 -42 23 -60 25 -60
6z"/>
<path d="M1300 1196 c0 -29 22 -49 44 -40 19 7 20 18 6 45 -16 28 -50 25 -50
-5z"/>
<path d="M1135 1190 c-14 -23 18 -31 75 -20 3 0 -4 7 -14 15 -23 17 -52 20
-61 5z"/>
<path d="M863 1183 c-21 -8 -15 -29 12 -41 34 -16 55 -15 55 2 0 11 -42 48
-52 45 -2 0 -9 -3 -15 -6z"/>
<path d="M1013 1163 c-15 -32 -12 -37 17 -28 14 5 20 13 18 28 -4 30 -21 31
-35 0z"/>
<path d="M1230 1172 c0 -28 25 -56 43 -49 15 6 15 9 -1 37 -19 33 -42 40 -42
12z"/>
<path d="M1077 1153 c-4 -3 -7 -13 -7 -20 0 -11 8 -13 33 -8 40 9 45 14 27 25
-18 11 -44 13 -53 3z"/>
<path d="M953 1135 c4 -8 2 -17 -4 -20 -10 -7 -3 -25 9 -25 4 0 13 4 21 9 17
11 5 51 -16 51 -9 0 -13 -6 -10 -15z"/>
<path d="M1170 1131 c0 -32 11 -51 30 -51 28 0 34 18 16 45 -20 30 -46 33 -46
6z"/>
<path d="M797 1133 c-12 -12 -7 -20 18 -31 56 -26 77 -5 23 22 -36 19 -33 18
-41 9z"/>
<path d="M1010 1101 c0 -15 6 -18 30 -16 37 3 49 13 30 25 -26 17 -60 12 -60
-9z"/>
<path d="M899 1106 c-1 -3 -2 -9 -3 -13 -1 -5 -5 -14 -9 -21 -10 -16 20 -29
35 -14 13 13 7 44 -9 50 -7 2 -14 1 -14 -2z"/>
<path d="M1110 1081 c0 -33 13 -46 37 -37 12 5 14 9 5 18 -7 7 -12 20 -12 30
0 10 -7 18 -15 18 -10 0 -15 -10 -15 -29z"/>
<path d="M745 1090 c-11 -18 15 -40 46 -40 36 0 37 12 4 34 -28 19 -41 20 -50
6z"/>
<path d="M950 1059 c0 -18 4 -20 27 -14 34 8 37 11 28 24 -3 6 -17 11 -31 11
-18 0 -24 -5 -24 -21z"/>
<path d="M835 1061 c4 -7 1 -18 -5 -26 -10 -12 -9 -16 5 -21 9 -4 21 -2 27 4
15 15 5 46 -16 50 -12 3 -16 0 -11 -7z"/>
<path d="M1040 1046 c0 -29 22 -49 44 -40 19 7 20 18 6 45 -16 28 -50 25 -50
-5z"/>
<path d="M691 1046 c-10 -11 -7 -17 11 -30 28 -20 58 -21 58 -1 0 8 -5 15 -12
15 -6 0 -19 7 -28 15 -15 13 -19 14 -29 1z"/>
<path d="M892 1023 c2 -13 12 -18 32 -18 36 1 45 20 14 29 -38 10 -50 7 -46
-11z"/>
<path d="M984 1016 c-7 -19 13 -56 30 -56 23 0 26 12 9 41 -19 32 -31 36 -39
15z"/>
<path d="M790 1005 c0 -8 -4 -15 -10 -15 -5 0 -10 -4 -10 -10 0 -12 37 -13 44
-1 8 12 -3 41 -15 41 -5 0 -9 -7 -9 -15z"/>
<path d="M644 995 c-9 -22 4 -35 37 -35 36 0 39 22 4 38 -33 15 -34 15 -41 -3z"/>
<path d="M837 985 c-8 -19 2 -24 36 -18 30 6 35 18 11 27 -26 10 -41 7 -47 -9z"/>
<path d="M930 968 c0 -35 15 -51 39 -43 20 6 20 8 6 36 -18 35 -45 39 -45 7z"/>
<path d="M727 953 c-6 -33 -3 -38 18 -29 10 3 15 15 13 28 -5 32 -25 33 -31 1z"/>
<path d="M595 950 c-10 -16 15 -40 41 -40 30 0 30 7 2 31 -27 21 -34 23 -43 9z"/>
<path d="M782 933 c3 -13 12 -17 33 -15 35 4 39 7 30 21 -3 6 -20 11 -36 11
-24 0 -30 -4 -27 -17z"/>
<path d="M870 928 c0 -33 15 -52 34 -45 15 6 15 9 1 37 -18 35 -35 39 -35 8z"/>
<path d="M676 904 c-8 -31 -3 -39 19 -30 10 3 15 15 13 28 -4 31 -25 33 -32 2z"/>
<path d="M547 896 c-7 -19 12 -36 40 -36 27 0 30 18 6 36 -23 17 -40 17 -46 0z"/>
<path d="M734 895 c-13 -34 10 -37 56 -7 7 5 -23 22 -38 22 -7 0 -15 -7 -18
-15z"/>
<path d="M820 881 c0 -30 11 -51 26 -51 20 0 28 25 14 49 -14 26 -40 27 -40 2z"/>
<path d="M630 866 c0 -14 0 -29 0 -33 0 -5 6 -8 13 -8 7 0 12 13 12 29 0 16
-6 31 -12 34 -8 2 -13 -6 -13 -22z"/>
<path d="M687 853 c-4 -3 -7 -13 -7 -21 0 -10 7 -12 27 -7 36 9 41 14 23 25
-18 11 -34 13 -43 3z"/>
<path d="M767 853 c-10 -20 11 -73 29 -73 17 0 17 4 2 47 -12 32 -23 41 -31
26z"/>
<path d="M500 835 c0 -18 37 -38 56 -31 21 8 17 20 -13 34 -35 16 -43 15 -43
-3z"/>
<path d="M590 816 c0 -8 -3 -21 -6 -30 -4 -10 -1 -16 9 -16 21 0 27 12 20 38
-6 24 -23 30 -23 8z"/>
<path d="M636 795 c-3 -9 -4 -20 -1 -25 7 -11 56 12 52 25 -6 17 -44 17 -51 0z"/>
<path d="M720 782 c0 -26 15 -52 31 -52 14 0 18 31 7 55 -15 34 -38 32 -38 -3z"/>
<path d="M461 786 c-17 -20 24 -49 50 -35 17 9 16 39 -1 39 -5 0 -15 2 -23 5
-7 3 -19 -1 -26 -9z"/>
<path d="M541 764 c2 -11 0 -24 -4 -31 -10 -15 12 -28 25 -15 13 13 6 54 -10
60 -9 3 -13 -3 -11 -14z"/>
<path d="M670 737 c0 -32 25 -65 39 -51 8 7 7 19 -5 42 -18 38 -34 42 -34 9z"/>
<path d="M590 729 c0 -15 4 -19 16 -15 9 3 22 6 30 6 8 0 14 7 14 15 0 10 -10
15 -30 15 -24 0 -30 -4 -30 -21z"/>
<path d="M421 727 c-15 -15 6 -37 35 -37 31 0 31 22 0 36 -17 8 -28 8 -35 1z"/>
<path d="M496 688 c-8 -38 -1 -47 20 -26 10 10 14 23 9 37 -9 30 -22 26 -29
-11z"/>
<path d="M624 697 c-7 -20 14 -67 30 -67 22 0 28 16 15 44 -14 29 -38 41 -45
23z"/>
<path d="M557 694 c-11 -11 -8 -44 3 -44 6 0 10 5 10 10 0 6 7 10 16 10 9 0
14 6 12 13 -5 14 -31 21 -41 11z"/>
<path d="M376 664 c-8 -22 -8 -22 13 -34 23 -12 51 -3 51 16 0 13 -29 34 -48
34 -6 0 -13 -7 -16 -16z"/>
<path d="M459 668 c-6 -28 -6 -78 0 -78 20 0 31 28 21 54 -8 22 -18 33 -21 24z"/>
<path d="M580 627 c0 -33 25 -65 40 -51 8 8 6 19 -7 42 -21 38 -33 41 -33 9z"/>
<path d="M504 625 c-3 -8 -3 -18 0 -24 8 -12 56 10 56 27 0 17 -49 15 -56 -3z"/>
<path d="M333 594 c-8 -21 10 -36 38 -32 32 4 34 22 4 36 -33 15 -34 15 -42
-4z"/>
<path d="M420 588 c0 -7 -3 -23 -6 -35 -5 -17 -2 -23 10 -23 18 0 23 54 6 65
-5 3 -10 0 -10 -7z"/>
<path d="M540 562 c0 -36 25 -61 43 -43 9 9 8 18 -3 38 -22 38 -40 41 -40 5z"/>
<path d="M467 573 c-9 -9 -9 -43 1 -43 13 1 42 27 42 39 0 12 -32 15 -43 4z"/>
<path d="M297 543 c-4 -3 -7 -15 -7 -25 0 -13 8 -18 30 -18 23 0 30 5 30 19 0
24 -37 41 -53 24z"/>
<path d="M370 522 c0 -11 -3 -27 -6 -36 -4 -12 0 -16 16 -16 18 0 21 5 18 32
-3 35 -28 52 -28 20z"/>
<path d="M500 496 c0 -38 26 -69 36 -43 5 14 -20 77 -31 77 -3 0 -5 -15 -5
-34z"/>
<path d="M433 513 c-7 -2 -13 -13 -13 -24 0 -22 0 -22 35 -9 23 9 25 13 15 25
-13 16 -17 17 -37 8z"/>
<path d="M244 465 c-9 -22 5 -35 37 -35 38 0 38 22 -2 37 -24 9 -31 9 -35 -2z"/>
<path d="M330 452 c0 -10 -5 -23 -11 -29 -8 -8 -7 -13 1 -18 18 -11 43 19 35
44 -8 26 -25 28 -25 3z"/>
<path d="M384 446 c-10 -8 -15 -20 -11 -30 6 -16 8 -16 32 0 14 9 25 20 25 24
0 15 -28 19 -46 6z"/>
<path d="M454 428 c9 -44 22 -56 42 -36 15 14 15 18 -1 42 -25 38 -49 35 -41
-6z"/>
<path d="M200 405 c-19 -23 -4 -45 30 -45 22 0 30 5 30 18 0 26 -45 46 -60 27z"/>
<path d="M280 386 c0 -13 -3 -31 -6 -40 -4 -11 -1 -16 10 -16 21 0 30 23 22
55 -8 32 -26 33 -26 1z"/>
<path d="M410 374 c0 -28 16 -64 29 -64 18 0 20 31 3 60 -21 37 -32 38 -32 4z"/>
<path d="M330 371 c-13 -25 1 -34 34 -21 29 11 34 25 10 34 -25 10 -33 7 -44
-13z"/>
<path d="M137 326 c-8 -21 17 -38 47 -30 41 10 35 26 -15 38 -19 4 -29 1 -32
-8z"/>
<path d="M221 299 c-7 -16 -10 -33 -7 -37 12 -12 41 15 41 38 0 35 -18 34 -34
-1z"/>
<path d="M360 303 c0 -16 7 -36 14 -45 12 -17 14 -17 29 0 14 16 15 23 4 45
-16 36 -47 36 -47 0z"/>
<path d="M293 313 c-14 -5 -18 -43 -5 -43 13 1 42 27 42 39 0 11 -15 13 -37 4z"/>
<path d="M82 268 c-29 -29 2 -53 46 -37 29 11 28 35 0 43 -31 8 -32 8 -46 -6z"/>
<path d="M170 256 c0 -9 -5 -25 -12 -36 -16 -25 -5 -35 22 -20 15 8 20 19 18
37 -3 29 -28 45 -28 19z"/>
<path d="M317 263 c-12 -11 -8 -58 6 -77 12 -16 14 -16 26 -2 11 13 11 22 -3
51 -18 38 -19 39 -29 28z"/>
<path d="M227 243 c-7 -6 -10 -43 -4 -43 13 0 67 33 67 41 0 10 -53 12 -63 2z"/>
<path d="M255 190 c-8 -14 4 -68 17 -76 5 -4 17 1 25 9 14 13 14 20 3 46 -12
31 -33 40 -45 21z"/>
</g>
</svg>

			</div><?php
			endif;?>

		</div><?php
	endif;?>
  </div>
</section>