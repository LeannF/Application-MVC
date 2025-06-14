/** function to show another table when a button is pressed */
function showTable(id) {
  const tables = document.querySelectorAll('.table-section');
  tables.forEach(table => {
    table.classList.remove('active');
  });

  document.getElementById(id).classList.add('active');
}

/** function to change the active button on click */
const buttons = document.querySelectorAll('.nav-btn');

buttons.forEach(btn => {
  btn.addEventListener('click', () => {
    buttons.forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
  });
});

/** function to pass ride'id for sql request */
document.querySelectorAll('.edit-btn').forEach(button => {
  button.addEventListener('click', () => {
    const id = button.getAttribute('data-id');

    document.getElementById('edit-agency-id').value = id;
  });
});

/** function to get the ride's owner information from the button */
const infoRideModal = document.getElementById('infoRideModal');

infoRideModal.addEventListener('show.bs.modal', event => {
  const button = event.relatedTarget;

  document.getElementById('modalFirstname').textContent = button.getAttribute('data-firstname');
  document.getElementById('modalLastname').textContent = button.getAttribute('data-lastname');
  document.getElementById('modalEmail').textContent = button.getAttribute('data-email');
  document.getElementById('modalPhonenumber').textContent = button.getAttribute('data-phonenumber');
  document.getElementById('modalTotalseat').textContent = button.getAttribute('data-total_seat');
});