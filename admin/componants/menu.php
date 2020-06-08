<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link <?php if($mn == 1){ echo "active";} ?>" href="index?uid=<?php echo $uid; ?>&role=<?php echo $role; ?>">
      <i class="ni ni-tv-2 text-primary"></i>
      <span class="nav-link-text">Dashboard</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if($mn == 2){ echo "active";} ?>" href="checkin-stagement?uid=<?php echo $uid; ?>&role=<?php echo $role; ?>">
      <i class="ni ni-book-bookmark text-orange"></i>
      <span class="nav-link-text">Check-in logs</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php if($mn == 3){ echo "active";} ?>" href="search?uid=<?php echo $uid; ?>&role=<?php echo $role; ?>">
      <i class="fas fa-search text-green"></i>
      <span class="nav-link-text">Search</span>
    </a>
  </li>
</ul>
