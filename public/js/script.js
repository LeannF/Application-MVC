function showTable(id) {
  const tables = document.querySelectorAll('.table-section');
  tables.forEach(table => {
    table.style.display = 'none';
  });

  document.getElementById(id).style.display = 'block';
}

document.querySelectorAll('.edit-btn').forEach(button => {
  button.addEventListener('click', () => {
    const id = button.getAttribute('data-id');

    document.getElementById('edit-agency-id').value = id;
  });
});

const infoRideModal = document.getElementById('infoRideModal');

infoRideModal.addEventListener('show.bs.modal', event => {
  const button = event.relatedTarget;

  document.getElementById('modalFirstname').textContent = button.getAttribute('data-firstname');
  document.getElementById('modalLastname').textContent = button.getAttribute('data-lastname');
  document.getElementById('modalEmail').textContent = button.getAttribute('data-email');
  document.getElementById('modalPhonenumber').textContent = button.getAttribute('data-phonenumber');
  document.getElementById('modalTotalseat').textContent = button.getAttribute('data-total_seat');
});