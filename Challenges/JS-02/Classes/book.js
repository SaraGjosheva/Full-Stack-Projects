class Book {
  constructor(title, author, maxPages, onPage = 0) {
    this.title = title;
    this.author = author;
    this.maxPages = maxPages;
    this.onPage = onPage;
  }

  get isRead() {
    return this.maxPages === this.onPage;
  }

  get progress() {
    return (this.onPage / this.maxPages) * 100;
  }

  get progressBarColor() {
    if (this.progress === 100) {
      return "bg-success";
    } else if (this.progress >= 75) {
      return "bg-info";
    } else if (this.progress >= 50) {
      return "bg-warning";
    } else {
      return "bg-danger";
    }
  }
}

let books = [
  new Book("The Hobbit", "J.R.R. Tolkien", 310, 310),
  new Book("The Lord of the Rings", "J.R.R. Tolkien", 1178, 500),
  new Book("1984", "George Orwell", 328, 328),
  new Book("To Kill a Mockingbird", "Harper Lee", 281, 100),
  new Book("Pride and Prejudice", "Jane Austen", 432, 200),
  new Book("Moby-Dick", "Herman Melville", 635, 150),
  new Book("War and Peace", "Leo Tolstoy", 1225, 1225),
  new Book("The Great Gatsby", "F. Scott Fitzgerald", 180, 50),
  new Book("Ulysses", "James Joyce", 730, 400),
  new Book("Don Quixote", "Miguel de Cervantes", 982, 982),
  new Book("The Blackbird", "Aco Shopov", 150, 75),
  new Book("Balkan Trilogy", "Georgi Markov", 400, 150),
  new Book("The Time of the Dying", "Goran Stefanovski", 220, 100),
  new Book("The Hat", "Venko Andonovski", 180, 60),
  new Book("The Secret", "Ljupcho Kocarev", 300, 100),
  new Book("The Country of the Long Dark", "Blazo Kozomara", 120, 70),
  new Book("Kalendar", "Petre M. Andreevski", 200, 200),
];

export { Book, books };
