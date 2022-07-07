  const profileBtn = document.getElementById('profileBtn');
  const profileMenu = document.getElementById('drop-profile');
  // create a toggle menu below the user name
  if (profileBtn) {
      profileBtn.addEventListener('click', function(ev) {
        let disp = profileMenu.style.display != 'block' ? 'block' : 'none';
        profileMenu.style.display = disp;
        ev.preventDefault();
      });
    }