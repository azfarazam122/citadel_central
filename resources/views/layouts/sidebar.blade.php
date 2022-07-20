  <link href="{{ asset('css/masterSettings.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <div id="body-pd" class="body-pd">
      {{-- ________________________________________________________ --}}
      {{-- BLADE TEMPLATE PHP --}}
      @php
          $user = Auth::user();
          $userId = App\Models\User::where('email', $user->email)->get(['id']);
          $checkIfUserIdFoundInAgentTable = App\Models\Agent::where('user_id', $userId[0]->id)->get(['id']);
          $checkIfUserIdFoundInAdminTable = App\Models\Admin::where('user_id', $userId[0]->id)->get(['id']);
          $checkIfUserIdFoundInMasterAdmin = App\Models\MasterAdmin::where('user_id', $userId[0]->id)->get(['id']);
          $checkIfUserIdFoundInSuperAdmin = App\Models\SuperAdmin::where('user_id', $userId[0]->id)->get(['id']);
          $userMatchWith = '';
          $userIsAgent = false;
          $userIsAdmin = false;
          $userIsMasterAdmin = false;
          $userIsSuperAdmin = false;

          if (count($checkIfUserIdFoundInAgentTable) > 0) {
              $userMatchWith = 'Agent';
              $userIsAgent = true;
          }
          if (count($checkIfUserIdFoundInAdminTable) > 0) {
              $userMatchWith = 'Admin';
              $userIsAdmin = true;
          }
          if (count($checkIfUserIdFoundInMasterAdmin) > 0) {
              $userMatchWith = 'Master';
              $userIsMasterAdmin = true;
          }
          if (count($checkIfUserIdFoundInSuperAdmin) > 0) {
              $userMatchWith = 'Super';
              $userIsSuperAdmin = true;
          }
      @endphp
      {{-- ________________________________________________________ --}}
      <div class="header body-pd" id="header">
          <div class="header_toggle">
              <i class='bx bx-menu bx-x' id="header-toggle"></i>
          </div>
      </div>
      <div class="l-navbar show" style="height: 100vh;" id="nav-bar">
          <div class="nav">
              <div>
                  <a href="/agent/home" class="nav_logo">
                      <i id="citadelCentralIcon" class='bx bx-layer nav_logo-icon'></i>
                      <span class="nav_logo-name">Citadel Central</span>
                  </a>
                  <div class="nav_list">
                      <a href="/admin_dashboard" id="adminDashboardTab" class="nav_link">
                          <i id="adminDashboardIcon" class='bx bx-grid-alt nav_icon'></i>
                          <span class="nav_name">Admin Dashboard</span>
                      </a>

                      @if ($userIsSuperAdmin == true)
                          <a href="/admin_dashboard/super" id="superSettingsTab" class="nav_link">
                              <i id="superSettingsIcon" class='bx bx-grid-alt nav_icon'></i>
                              <span class="nav_name">Super Settings</span>
                          </a>
                      @endif

                      {{-- ___________________________________ --}}
                      @if ($userIsMasterAdmin == true)
                          <a href="/admin_dashboard/master" id="masterSettingsTab" class="nav_link">
                              <i id="masterSettingsIcon" class='bx bx-grid-alt nav_icon'></i>
                              <span class="nav_name">Master Settings</span>
                          </a>
                          <a href="/admin_dashboard/users" id="manageUsersTab" class="nav_link">
                              <i id="manageUsersIcon" class='bx bx-user nav_icon'></i>
                              <span class="nav_name">Manage Users</span>
                          </a>
                          <a href="/admin_dashboard/admins" id="manageAdminsTab" class="nav_link">
                              <i id="manageAdminsIcon" class='bx bx-user nav_icon'></i>
                              <span class="nav_name">Manage Admins</span>
                          </a>
                      @endif
                      {{-- ___________________________________ --}}

                      @if ($userIsAdmin == true)
                          <a href="/admin_dashboard/agents" id="manageAgentsTab" class="nav_link">
                              <i id="manageAgentsIcon" class='bx bx-bar-chart-alt-2 nav_icon'></i>
                              <span class="nav_name">Manage Agents</span>
                          </a>
                          <a href="/admin_dashboard/admin" id="adminTab" class="nav_link">
                              <i id="adminIcon" class='bx bx-bar-chart-alt-2 nav_icon'></i>
                              <span class="nav_name">Admin</span>
                          </a>
                          <a href="/admin_dashboard/agents/pages" id="agentPagesTab" class="nav_link">
                              <i id="agentPagesIcon" class='bx bx-bar-chart-alt-2 nav_icon'></i>
                              <span class="nav_name">Agents Pages</span>
                          </a>
                      @endif
                      @if ($userIsAgent == true)
                          <a href="/admin_dashboard/agent" id="yourProfileTab" class="nav_link">
                              <i id="yourProfileIcon" class='bx bx-bar-chart-alt-2 nav_icon'></i>
                              <span class="nav_name">Your Profile</span>
                          </a>
                          {{-- ________ --}}
                          <p>
                              <a data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                                  aria-controls="collapseExample" id="pagesEditorTab" class="nav_link">
                                  <i id="pagesEditorIcon" class='bx bx-bar-chart-alt-2 nav_icon'></i>
                                  <span class="nav_name">Pages Editor
                                      <i class='bx bxs-down-arrow'></i>
                                  </span>
                              </a>
                          </p>
                          <div class="collapse" id="collapseExample">
                              <a href="/admin_dashboard/pages_editor/home_page" target="_blank" id="pagesEditorTab"
                                  class="ms-4 nav_link">
                                  <i style="font-size: 1.25rem;" class='bx bx-home-alt-2'></i>
                                  <span class="nav_name">Home Page
                                  </span>
                              </a>
                              <a href="/admin_dashboard/pages_editor/about_page" target="_blank" id="pagesEditorTab"
                                  class="ms-4 nav_link">
                                  <i style="font-size: 1.25rem;" class='bx bx-male'></i>
                                  <span class="nav_name">About Page
                                  </span>
                              </a>
                              <a href="/admin_dashboard/pages_editor/rates_page" target="_blank" id="pagesEditorTab"
                                  class="ms-4 nav_link">
                                  <i style="font-size: 1.25rem;" class='bx bxs-bank'></i>
                                  <span class="nav_name">Rates Page
                                  </span>
                              </a>
                          </div>
                      @endif

                      <hr style="color: white">
                      <a href="https://yourmortgagecalculators.ca/calculators/" target="blank" class="nav_link">
                          <i id="calculatorsIcon" class='bx bx-grid-alt nav_icon'></i>
                          <span class="nav_name">Calculators</span>
                      </a>
                      @if ($userIsAgent == true || $userIsAdmin == true || $userIsMasterAdmin == true || $userIsSuperAdmin == true)
                          <a href="https://yourmortgagecalculators.ca/calculators/adminlogin.php" target="blank"
                              class="nav_link">
                              <i id="adminLoginIcon" class='bx bx-grid-alt nav_icon'></i>
                              <span class="nav_name">Admin Login</span>
                          </a>
                      @endif
                      @if ($userIsMasterAdmin == true || $userIsSuperAdmin == true)
                          <a href="https://yourmortgagecalculators.ca/calculators/superadmin.php" target="blank"
                              class="nav_link">
                              <i id="superAdminLoginIcon" class='bx bx-grid-alt nav_icon'></i>
                              <span class="nav_name">Super Admin Login</span>
                          </a>
                      @endif

                  </div>
              </div>
              {{-- <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span
                      class="nav_name">SignOut</span> </a> --}}
          </div>
      </div>


  </div>

  <!-- Production -->
  <script src="{{ asset('js/masterSettings.js') }}" defer></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <script src="https://unpkg.com/tippy.js@6"></script>
  <script>
      tippy('#header-toggle', {
          content: 'Side Menu',
      });
      tippy('#citadelCentralIcon', {
          content: 'Citadel Central',
      });
      tippy('#adminDashboardIcon', {
          content: 'Admin Dashboard',
      });
      tippy('#superSettingsIcon', {
          content: 'Super Settings',
      });
      tippy('#masterSettingsIcon', {
          content: 'Master Settings',
      });
      tippy('#manageUsersIcon', {
          content: 'Manage Users',
      });
      tippy('#manageAdminsIcon', {
          content: 'Manage Admins',
      });
      tippy('#manageAgentsIcon', {
          content: 'Manage Agents',
      });
      tippy('#adminIcon', {
          content: 'Admin',
      });
      tippy('#yourProfileIcon', {
          content: 'Your Profile',
      });
      tippy('#calculatorsIcon', {
          content: 'Calculators',
      });
      tippy('#adminLoginIcon', {
          content: 'Admin Login',
      });
      tippy('#superAdminLoginIcon', {
          content: 'Super Admin Login',
      });
      checkWhichTabIsOpen();

      function checkWhichTabIsOpen() {
          if (window.location.href.includes("/admin_dashboard/super")) {
              $(".nav_link").removeClass("changeColorOfSidebarSelectedTab");
              $("#superSettingsTab").addClass("changeColorOfSidebarSelectedTab");
          } else if (window.location.href.includes("/admin_dashboard/master")) {
              $(".nav_link").removeClass("changeColorOfSidebarSelectedTab");
              $("#masterSettingsTab").addClass("changeColorOfSidebarSelectedTab");
          } else if (window.location.href.includes("/admin_dashboard/users")) {
              $(".nav_link").removeClass("changeColorOfSidebarSelectedTab");
              $("#manageUsersTab").addClass("changeColorOfSidebarSelectedTab");
          } else if (window.location.href.includes("/admin_dashboard/admins")) {
              $(".nav_link").removeClass("changeColorOfSidebarSelectedTab");
              $("#manageAdminsTab").addClass("changeColorOfSidebarSelectedTab");
          } else if (window.location.href.includes("/admin_dashboard/agents/pages")) {
              $(".nav_link").removeClass("changeColorOfSidebarSelectedTab");
              $("#agentPagesTab").addClass("changeColorOfSidebarSelectedTab");
          } else if (window.location.href.includes("/admin_dashboard/agents")) {
              $(".nav_link").removeClass("changeColorOfSidebarSelectedTab");
              $("#manageAgentsTab").addClass("changeColorOfSidebarSelectedTab");
          } else if (window.location.href.includes("/admin_dashboard/admin")) {
              $(".nav_link").removeClass("changeColorOfSidebarSelectedTab");
              $("#adminTab").addClass("changeColorOfSidebarSelectedTab");
          } else if (window.location.href.includes("/admin_dashboard/agent")) {
              $(".nav_link").removeClass("changeColorOfSidebarSelectedTab");
              $("#yourProfileTab").addClass("changeColorOfSidebarSelectedTab");
          } else if (window.location.href.includes("/admin_dashboard")) {
              $(".nav_link").removeClass("changeColorOfSidebarSelectedTab");
              $("#adminDashboardTab").addClass("changeColorOfSidebarSelectedTab");
          }

      }
  </script>
