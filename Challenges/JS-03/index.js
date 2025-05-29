class Product {
  constructor(name, price, imageUrl) {
    this.name = name;
    this.price = price;
    this.imageUrl = imageUrl;
    this.reviews = [];
  }

  getAverageRating() {
    if (this.reviews.length === 0) return 0;
    return Math.round(
      this.reviews.reduce((sum, r) => sum + r.rating, 0) / this.reviews.length
    );
  }

  addReview(comment, rating) {
    this.reviews.push({
      comment,
      rating,
      timestamp: new Date().toLocaleString(),
    });
  }
}

const products = [
  new Product(
    "Product 1",
    "$10.00",
    "https://placehold.jp/922a2a/ffffff/150x150.png"
  ),
  new Product(
    "Product 2",
    "$20.00",
    "https://placehold.jp/3d4070/ffffff/150x150.png"
  ),
  new Product(
    "Product 3",
    "$25.00",
    "https://placehold.jp/41922a/ffffff/150x150.png"
  ),
];

function renderProducts() {
  let productList = document.getElementById("product-list");
  productList.innerHTML = "";
  products.forEach((product, index) => {
    let card = document.createElement("div");
    card.className = "col-12 col-md-4 mb-3";
    card.innerHTML = `
              <div class="card" onclick="openModal(${index})">
                  <img src="${
                    product.imageUrl
                  }" class="card-img-top px-2 pt-2" alt="${product.name}">
                  <div class="card-body">
                      <h5 class="card-title h3 text-center mb-3">${
                        product.name
                      }</h5>
                      <p class="card-text text-center fs-5">${product.price}</p>
                      <p class="card-text text-center fs-5">Rating: ${product.getAverageRating()}/5</p>
                  </div>
              </div>`;
    productList.appendChild(card);
  });
}

function openModal(index) {
  let product = products[index];
  const totalPossibleRating = 5;

  document.getElementById("productModalLabel").innerText = product.name;
  let averageRating = product.getAverageRating();
  document.getElementById(
    "productRating"
  ).innerText = `${averageRating}/${totalPossibleRating}`;
  document.getElementById("reviewList").innerHTML = product.reviews
    .map(
      (review) =>
        `<li class="list-group-item gap-3">
                <p class="mt-3"><strong>Rating:</strong> ${review.rating}/${totalPossibleRating}</p>
                <p><strong>Comment:</strong> ${review.comment}</p>
                <p class="fs-6 fst-italic">Posted on: ${review.timestamp}</p>
        </li>`
    )
    .join("");

  document.getElementById("reviewForm").onsubmit = function (event) {
    event.preventDefault();
    let comment = document.getElementById("reviewComment").value;
    let rating = parseInt(document.getElementById("reviewRating").value);
    product.addReview(comment, rating);
    openModal(index);
    renderProducts();
    document.getElementById("reviewComment").value = "";
    document.getElementById("reviewRating").value = "1";
  };

  const productModal = new bootstrap.Modal(
    document.getElementById("productModal")
  );

  productModal.show();

  const modalElement = document.getElementById("productModal");

  modalElement.addEventListener("hidden.bs.modal", function () {
    const modalInstance = bootstrap.Modal.getInstance(modalElement);
    if (modalInstance) {
      modalInstance.dispose();
    }

    const backdrops = document.querySelectorAll(".modal-backdrop");
    backdrops.forEach((backdrop) => {
      backdrop.parentNode.removeChild(backdrop);
    });
  });
}

renderProducts();
