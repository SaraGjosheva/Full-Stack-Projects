import { Book, books } from "./Classes/book.js";

function createBookTable() {
  let table = document.querySelector("#bookTable tbody");
  table.innerHTML = "";

  books.forEach((book) => {
    let row = document.createElement("tr");

    let titleCell = document.createElement("td");
    titleCell.textContent = `${book.title} by ${book.author}`;
    row.appendChild(titleCell);

    let totalPagesCell = document.createElement("td");
    totalPagesCell.textContent = book.maxPages;
    row.appendChild(totalPagesCell);

    let currentPageCell = document.createElement("td");
    currentPageCell.textContent = book.onPage;
    row.appendChild(currentPageCell);

    let statusCell = document.createElement("td");
    statusCell.textContent = book.isRead
      ? `You already read "${book.title}" by ${book.author}.`
      : `You still need to read "${book.title}" by ${book.author}.`;
    statusCell.classList.add(book.isRead ? "text-success" : "text-danger");
    row.appendChild(statusCell);

    let progressCell = document.createElement("td");
    let progressBar = document.createElement("div");
    progressBar.className = "progress";
    let progressInner = document.createElement("div");
    progressInner.className = `progress-bar ${book.progressBarColor}`;
    progressInner.style.width = `${book.progress}%`;
    progressInner.setAttribute("role", "progressbar");
    progressInner.setAttribute("aria-valuenow", book.progress);
    progressInner.setAttribute("aria-valuemin", "0");
    progressInner.setAttribute("aria-valuemax", "100");
    progressInner.textContent = `${Math.round(book.progress)}%`;
    progressBar.appendChild(progressInner);
    progressCell.appendChild(progressBar);
    row.appendChild(progressCell);

    table.appendChild(row);
  });
}

function addBook(event) {
  event.preventDefault();
  let title = document.getElementById("title").value;
  let author = document.getElementById("author").value;
  let maxPages = parseInt(document.getElementById("maxPages").value);
  let onPage = parseInt(document.getElementById("onPage").value);

  books.push(new Book(title, author, maxPages, onPage));
  createBookTable();
  document.getElementById("addBook").reset();
}

document.addEventListener("DOMContentLoaded", () => {
  createBookTable();

  let form = document.getElementById("addBook");
  form.addEventListener("submit", addBook);
});
