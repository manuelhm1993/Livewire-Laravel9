import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import Swal from 'sweetalert2';

window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

// Convierde a Swal en una variable global
window.Swal = Swal;
