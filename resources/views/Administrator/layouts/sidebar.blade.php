<!DOCTYPE html>
<html >

<head>
<title>Car Mart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">   
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon-icon/favicon.png') }}"> 
    
    <!-- FontAwesome JS-->
    <script defer src="{{ asset('assets2/plugins/fontawesome/js/all.min.js') }}"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="{{ asset('assets2/css/portal.css') }}">

    <link rel="icon" type="image/x-icon" href="{{ asset('images/prio-logo-white.png') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/font/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('administrator/css/Sidebar-Menu.css') }}">
    <link rel="stylesheet" href="{{ asset('administrator/css/style.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i">



    @if(str_contains(URL::current(), 'forum')) 
	<!-- Start Forum Link -->
	<!-- Feather icons (https://github.com/feathericons/feather) -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

    <!-- Vue (https://github.com/vuejs/vue) -->
    @if (config('app.debug'))
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    @else
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
    @endif

    <!-- Axios (https://github.com/axios/axios) -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <!-- Pickr (https://github.com/Simonwep/pickr) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/classic.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js"></script>

    <!-- Sortable (https://github.com/SortableJS/Sortable) -->
    <script src="//cdn.jsdelivr.net/npm/sortablejs@1.10.1/Sortable.min.js"></script>
    <!-- Vue.Draggable (https://github.com/SortableJS/Vue.Draggable) -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/Vue.Draggable/2.23.2/vuedraggable.umd.min.js"></script>

	<!-- end Forum Links -->
    @endif


</head>

<body class="app">   	
    <header class="app-header fixed-top">	   	            
        <div class="app-header-inner">  
	        <div class="container-fluid py-2">
		        <div class="app-header-content"> 
		            <div class="row justify-content-between align-items-center">
                        <div class="col-auto">
                            <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" role="img"><title>Menu</title><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path></svg>
                            </a>
                        </div><!--//col-->
    
		            
                        <div class="app-utilities col-auto">
                                                        
                            <div class="app-utility-item app-user-dropdown dropdown">
                                <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><img src="{{ asset('userProfiles/'. Auth::user()->avatar) }}" alt="user profile"></a>
                                <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                                    <li><a class="dropdown-item" href="{{ route('admin.view.user', Auth::user()->id) }}">Profile</a></li>
                                    <li>
										<form  action="{{ route('logout') }}" method="post">
											@csrf
											<button class="dropdown-item" type="submit">Logout</button>
										</form>
									</li>
                                </ul>
                            </div><!--//app-user-dropdown--> 

                        </div><!--//app-utilities-->

		            </div><!--//row-->
	            </div><!--//app-header-content-->
	        </div><!--//container-fluid-->
        </div><!--//app-header-inner-->
        <div id="app-sidepanel" class="app-sidepanel"> 
	        <div id="sidepanel-drop" class="sidepanel-drop">

            </div>
	        <div class="sidepanel-inner d-flex flex-column">
		        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>

		        <div class="app-branding">
		            <a style="text-decoration: none;"class="app-logo d-flex justify-content-center" href="{{ route('dashboard') }}"><img class="logo-prio me-2" src="{{ asset('assets/images/CarMartSmallV2.png') }}" alt="logo"></a>
		        </div><!--//app-branding-->  

			    <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
				    <ul class="app-menu list-unstyled accordion" id="menu-accordion">

					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link @if(str_contains(URL::current(), 'dashboard')) active @endif" href="{{ route('dashboard') }}">
						        <span class="nav-icon">
						        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"/>
                                    <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                                </svg>
						         </span>
		                         <span class="nav-link-text">Overview</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->

                        <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link @if(str_contains(URL::current(), 'Cars')) active @endif" href="{{ route('admin.cars') }}">
						        <span class="nav-icon">
						        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-car-front" viewBox="0 0 16 16">
                                    <path d="M4 9a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm10 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2H6ZM4.862 4.276 3.906 6.19a.51.51 0 0 0 .497.731c.91-.073 2.35-.17 3.597-.17 1.247 0 2.688.097 3.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 10.691 4H5.309a.5.5 0 0 0-.447.276Z"/>
                                    <path fill-rule="evenodd" d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848ZM4.82 3a1.5 1.5 0 0 0-1.379.91l-.792 1.847a1.8 1.8 0 0 1-.853.904.807.807 0 0 0-.43.564L1.03 8.904a1.5 1.5 0 0 0-.03.294v.413c0 .796.62 1.448 1.408 1.484 1.555.07 3.786.155 5.592.155 1.806 0 4.037-.084 5.592-.155A1.479 1.479 0 0 0 15 9.611v-.413c0-.099-.01-.197-.03-.294l-.335-1.68a.807.807 0 0 0-.43-.563 1.807 1.807 0 0 1-.853-.904l-.792-1.848A1.5 1.5 0 0 0 11.18 3H4.82Z"/>
                                </svg>
						         </span>
		                         <span class="nav-link-text">Cars</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->

                        <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link @if(str_contains(URL::current(), 'Users')) active @endif" href="{{ route('admin.users') }}">
						        <span class="nav-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
                                    </svg>
						         </span>
		                         <span class="nav-link-text">Users</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->

					    <li class="nav-item">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link @if(str_contains(URL::current(), 'Setting')) active @endif" href="{{ route('Setting') }}">
						        <span class="nav-icon">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-folder" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path d="M9.828 4a3 3 0 0 1-2.12-.879l-.83-.828A1 1 0 0 0 6.173 2H2.5a1 1 0 0 0-1 .981L1.546 4h-1L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3v1z"/>
										<path fill-rule="evenodd" d="M13.81 4H2.19a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4zM2.19 3A2 2 0 0 0 .198 5.181l.637 7A2 2 0 0 0 2.826 14h10.348a2 2 0 0 0 1.991-1.819l.637-7A2 2 0 0 0 13.81 3H2.19z"/>
									</svg>
						         </span>
		                         <span class="nav-link-text">Car Options</span>
					        </a><!--//nav-link-->
					    </li><!--//nav-item-->

                        <li class="nav-item has-submenu">
					        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					        <a class="nav-link submenu-toggle @if(str_contains(URL::current(), 'forum')) active @endif" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-1" aria-expanded="false" aria-controls="submenu-1">
						        <span class="nav-icon">
						        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
						        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-files" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4z"/>
                                    <path d="M6 0h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1H4a2 2 0 0 1 2-2z"/>
                                </svg>
						         </span>
		                         <span class="nav-link-text">Forum</span>
		                         <span class="submenu-arrow">
		                             <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                    </svg>
	                             </span><!--//submenu-arrow-->
					        </a><!--//nav-link-->
					        <div id="submenu-1" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">
						        <ul class="submenu-list list-unstyled">
									<li class="submenu-item"><a style="text-decoration:none;" class="submenu-link @if(str_contains(URL::current(), 'forum')) active @endif" href="{{ url(config('forum.web.router.prefix')) }}">{{ trans('forum::general.index') }}</a></li>
									<li class="submenu-item"><a style="text-decoration:none;" class="submenu-link @if(str_contains(URL::current(), 'recent')) active @endif" href="{{ route('forum.recent') }}">{{ trans('forum::threads.recent') }}</a></li>

                                    <!-- <li class="submenu-item"><a style="text-decoration:none;" class="submenu-link @if(str_contains(URL::current(), 'unread')) active @endif" href="{{ route('forum.unread') }}">{{ trans('forum::threads.unread_updated') }}</a></li> -->
                                    <li class="submenu-item"><a style="text-decoration:none;" class="submenu-link @if(str_contains(URL::current(), 'manage')) active @endif" href="{{ route('forum.category.manage') }}">{{ trans('forum::general.manage') }}</a></li>

						        </ul>
					        </div>
					    </li><!--//nav-item-->

                        

				    </ul><!--//app-menu-->
			    </nav><!--//app-nav-->
        
	        </div><!--//sidepanel-inner-->
	    </div><!--//app-sidepanel-->
    </header><!--//app-header-->
    
    <div class="app-wrapper">
	   
        @yield('contentDashboard')
	    
        <br/>
	    <footer class="app-footer">
		    <div class="container text-center py-3">
            Copyright © 2022 CarMart. All Rights Reserved
            
		       
		    </div>
	    </footer><!--//app-footer-->
	    
    </div><!--//app-wrapper-->    

    <script src="{{ asset('administrator/js/admin-js.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Javascript -->          
    <script src="{{ asset('assets2/plugins/popper.min.js') }}"></script>
    

    <!-- Charts JS -->
    <script src="{{ asset('assets2/plugins/chart.js/chart.min.js') }}"></script> 
    <script src="{{ asset('assets2/js/index-charts.js') }}"></script> 
    
    <!-- Page Specific JS -->
    <script src="{{ asset('assets2/js/app.js') }}"></script> 

	<script>
    new Vue({
        el: '.v-navbar',
        name: 'Navbar',
        data: {
            isCollapsed: true,
            isUserDropdownCollapsed: true
        },
        methods: {
            onWindowClick (event) {
                const ignore = ['navbar-toggler', 'navbar-toggler-icon', 'dropdown-toggle'];
                if (ignore.some(className => event.target.classList.contains(className))) return;
                if (! this.isCollapsed) this.isCollapsed = true;
                if (! this.isUserDropdownCollapsed) this.isUserDropdownCollapsed = true;
            }
        },
        created: function () {
            window.addEventListener('click', this.onWindowClick);
        }
    });

    const mask = document.querySelector('.mask');

    function findModal (key)
    {
        const modal = document.querySelector(`[data-modal=${key}]`);

        if (! modal) throw `Attempted to open modal '${key}' but no such modal found.`;

        return modal;
    }

    function openModal (modal)
    {
        modal.style.display = 'block';
        mask.style.display = 'block';
        setTimeout(function()
        {
            modal.classList.add('show');
            mask.classList.add('show');
        }, 200);
    }

    document.querySelectorAll('[data-open-modal]').forEach(item =>
    {
        item.addEventListener('click', event =>
        {
            event.preventDefault();

            openModal(findModal(event.currentTarget.dataset.openModal));
        });
    });

    document.querySelectorAll('[data-modal]').forEach(modal =>
    {
        modal.addEventListener('click', event =>
        {
            if (! event.target.hasAttribute('data-close-modal')) return;

            modal.classList.remove('show');
            mask.classList.remove('show');
            setTimeout(function()
            {
                modal.style.display = 'none';
                mask.style.display = 'none';
            }, 200);
        });
    });

    document.querySelectorAll('[data-dismiss]').forEach(item =>
    {
        item.addEventListener('click', event => event.currentTarget.parentElement.style.display = 'none');
    });

    document.addEventListener('DOMContentLoaded', event =>
    {
        const hash = window.location.hash.substr(1);
        if (hash.startsWith('modal='))
        {
            openModal(findModal(hash.replace('modal=','')));
        }

        feather.replace();

        const input = document.querySelector('input[name=color]');

        if (! input) return;

        const pickr = Pickr.create({
            el: '.pickr',
            theme: 'classic',
            default: input.value || null,

            swatches: [
                '{{ config('forum.web.default_category_color') }}',
                '#f44336',
                '#e91e63',
                '#9c27b0',
                '#673ab7',
                '#3f51b5',
                '#2196f3',
                '#03a9f4',
                '#00bcd4',
                '#009688',
                '#4caf50',
                '#8bc34a',
                '#cddc39',
                '#ffeb3b',
                '#ffc107'
            ],

            components: {
                preview: true,
                hue: true,
                interaction: {
                    input: true,
                    save: true
                }
            },

            strings: {
                save: 'Apply'
            }
        });

        pickr
            .on('save', instance => pickr.hide())
            .on('clear', instance =>
            {
                input.value = '';
                input.dispatchEvent(new Event('change'));
            })
            .on('cancel', instance =>
            {
                const selectedColor = instance
                    .getSelectedColor()
                    .toHEXA()
                    .toString();

                input.value = selectedColor;
                input.dispatchEvent(new Event('change'));
            })
            .on('change', (color, instance) =>
            {
                const selectedColor = color
                    .toHEXA()
                    .toString();

                input.value = selectedColor;
                input.dispatchEvent(new Event('change'));
            });
    });
    </script>

    @if(str_contains(URL::current(), 'dashboard')) 
        <script>
            var xValues = [
                @for($i=0; $i < 5; $i++)
                    "{!! $monthCar[$i][0] !!}",
                @endfor

            ];
            var yValues = [
                @for($i=0; $i < 5; $i++)
                    "{!! $monthCar[$i][1] !!}",
                @endfor
            ];
            var barColors = ["#FA2837", "#FA2837","#FA2837","#FA2837","#FA2837"];

            new Chart("mychart-CarCountbar", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [{
                backgroundColor: barColors,
                data: yValues
                }]
            },
            options: {
                legend: {display: false},
                title: {
                display: true,
                }
            }
            });



            var xValues2 = [
                @for($i=0; $i < 5; $i++)
                    "{!! $monthUser[$i][0] !!}",
                @endfor

            ];
            var yValues2 = [
                @for($i=0; $i < 5; $i++)
                    "{!! $monthUser[$i][1] !!}",
                @endfor
            ];
            var barColors = ["#FA2837", "#FA2837","#FA2837","#FA2837","#FA2837"];

            new Chart("mychart-UserCountbar", {
            type: "bar",
            data: {
                labels: xValues2,
                datasets: [{
                backgroundColor: barColors,
                data: yValues2
                }]
            },
            options: {
                legend: {display: false},
                title: {
                display: true,
                }
            }
            });



            var xValues3 = [
                @for($i=0; $i < 2; $i++)
                    "{!! $userPie[$i][0] !!}",
                @endfor
            ];
            var yValues3 = [
                @for($i=0; $i < 2; $i++)
                    "{!! $userPie[$i][1] !!}",
                @endfor
            ];
            var barColors3 = [
            "#FA2837",
            "#FFECED",
            ];

            new Chart("mychart-UserPie", {
            type: "doughnut",
            data: {
                labels: xValues3,
                datasets: [{
                backgroundColor: barColors3,
                data: yValues3
                }]
            },
            options: {
                title: {
                display: true,
                }
            }
            });
        </script>
    @endif 
</body>
</html>