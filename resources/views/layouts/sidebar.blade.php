  <link href="{{ asset('css/masterSettings.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <div id="body-pd">
      <div class="header" id="header">
          <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
          {{-- <div class="header_img"> <img width="100%" src="/images/logo.png" alt=""> </div> --}}
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
              if (count($checkIfUserIdFoundInAgentTable) > 0) {
                  $userMatchWith = 'Agent';
              } elseif (count($checkIfUserIdFoundInAdminTable) > 0) {
                  $userMatchWith = 'Admin';
              } elseif (count($checkIfUserIdFoundInMasterAdmin) > 0) {
                  $userMatchWith = 'Master';
              } elseif (count($checkIfUserIdFoundInSuperAdmin) > 0) {
                  $userMatchWith = 'Admin';
              }
          @endphp
          {{-- ________________________________________________________ --}}
      </div>
      <div class="l-navbar" id="nav-bar">
          <div class="nav">
              <div> <a href="/admin_dashboard" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i>
                      <span class="nav_logo-name">Citadel Central</span> </a>
                  <div class="nav_list">

                      <a href="/admin_dashboard" class="nav_link">
                          <i class='bx bx-grid-alt nav_icon'></i>
                          <span class="nav_name">Admin Dashboard</span>
                      </a>
                      @if ($userMatchWith == 'Super')
                          <a href="/admin_dashboard/super" class="nav_link">
                              <i class='bx bx-grid-alt nav_icon'></i>
                              <span class="nav_name">Super Settings</span>
                          </a>
                      @endif

                      {{-- ___________________________________ --}}
                      @if ($userMatchWith == 'Master')
                          <a href="/admin_dashboard/master" class="nav_link">
                              <i class='bx bx-grid-alt nav_icon'></i>
                              <span class="nav_name">Master Settings</span>
                          </a>
                          <a href="/admin_dashboard/users" class="nav_link">
                              <i class='bx bx-user nav_icon'></i>
                              <span class="nav_name">Manage Users</span>
                          </a>
                          <a href="/admin_dashboard/admins" class="nav_link">
                              <i class='bx bx-user nav_icon'></i>
                              <span class="nav_name">Manage Admins</span>
                          </a>
                          {{-- <a href="#" class="nav_link">
                              <i class='bx bx-message-square-detail nav_icon'></i>
                              <span class="nav_name">Admin Details</span>
                          </a> --}}
                          {{-- <a href="#" class="nav_link">
                              <i class='bx bx-folder nav_icon'></i>
                              <span class="nav_name">Admin Agent Details</span>
                          </a> --}}
                          {{-- <a href="" class="nav_link">
                              <i class='bx bx-bookmark nav_icon'></i>
                              <span class="nav_name">Manage Admin Agents</span>
                          </a> --}}
                      @endif
                      {{-- ___________________________________ --}}

                      @if ($userMatchWith == 'Admin')
                          <a href="/admin_dashboard/agents" class="nav_link">
                              <i class='bx bx-bar-chart-alt-2 nav_icon'></i>
                              <span class="nav_name">Manage Agents</span>
                          </a>
                          {{-- <a href="" class="nav_link">
                              <i class='bx bx-bar-chart-alt-2 nav_icon'></i>
                              <span class="nav_name">Agent Detail</span>
                          </a> --}}
                          <a href="/admin_dashboard/admin" class="nav_link">
                              <i class='bx bx-bar-chart-alt-2 nav_icon'></i>
                              <span class="nav_name">Admin</span>
                          </a>
                      @endif
                      @if ($userMatchWith == 'Agent')
                          <a href="/admin_dashboard/agent" class="nav_link">
                              <i class='bx bx-bar-chart-alt-2 nav_icon'></i>
                              <span class="nav_name">Agent</span>
                          </a>
                      @endif

                  </div>
              </div> <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span
                      class="nav_name">SignOut</span> </a>
          </div>
      </div>
      <!--Container Main start-->

  </div>
