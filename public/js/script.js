function showTable(id) {
  const tables = document.querySelectorAll('.table-section');
  tables.forEach(table => {
    table.style.display = 'none';
  });

  document.getElementById(id).style.display = 'block';
}