const container = document.querySelectorAll('.seat-container');
const seats = document.querySelectorAll('.seat-row .seat:not(.occupied)');
const count = document.getElementById('count');
const total = document.getElementById('total');
const movieSelect = document.getElementById('movie');


var x = document.getElementById("myDate");
// get today's date


var today = new Date().toISOString().split('T')[0];
x.setAttribute('min', today);

populateUI();

console.log(container);

let ticketPrice = +movieSelect.value;

//save selected movie index and price
function setMovieData(movieIndex, moviePrice) {
    // localStorage.setItem('selectedMovieIndex', movieIndex);
    // localStorage.setItem('selectedMoviePrice', moviePrice);
}

//update total and count
function updateSelectedCount() {
    const selectedSeats = document.querySelectorAll('.seat-row .seat.selected');

    const seatsIndex = [...selectedSeats].map(seat => [...seats].indexOf(seat));

    // localStorage.setItem('selectedSeats', JSON.stringify(seatsIndex));

    const selectedSeatsCount = selectedSeats.length;

    count.innerText = selectedSeatsCount;
    total.innerText = selectedSeatsCount * ticketPrice;
}

//get data from local storage & populate UI
function populateUI() {
    const selectedSeats = JSON.parse(localStorage.getItem('selectedSeats'));

    if (selectedSeats !== null && selectedSeats.length > 0) {
        seats.forEach((seat, index) => {
            if (selectedSeats.indexOf(index) > -1) {
                seat.classList.add('selected');
            }
        });
    }

    const selectedMovieIndex = localStorage.getItem('selectedMovieIndex');

    if (selectedMovieIndex !== null) {
        movieSelect.selectedIndex = selectedMovieIndex;
    }
}

//movie select event
movieSelect.addEventListener('change', e => {
    ticketPrice = +e.target.value;
    setMovieData(e.target.selectedIndex, e.target.value)
    updateSelectedCount();
});

//seat click event
container.forEach((item) => {
    item.addEventListener('click', e => {
        if (e.target.classList.contains('seat') && !e.target.classList.contains('occupied')) {
            e.target.classList.toggle('selected');
            // console.log(e.target);
            updateSelectedCount();
        }
    });
});


//initial count and total set
updateSelectedCount();

function allselectedseats(email, busname, date, start, end, ) {
    console.log(email);
    console.log(busname);
    // var selectedSeats = document.querySelectorAll('.seat-row .seat.selected');
    var selectedSeats = document.getElementsByClassName("selected");
    var seats = document.querySelectorAll('.seat-row .seat');
    // for (i = 0; i < seats.length; i++) {
    //     console.log(document.getElementsByName(i).value);
    // }
    console.log(selectedSeats);
    // var seatsIndex = [...selectedSeats].map(seat => [...seats].indexOf(seat) + 1);
    var seatsIndex = [];
    for (i = 0; i < selectedSeats.length; i++) {
        seatsIndex.push(selectedSeats[i].getAttribute("name"));
    }
    console.log("seats in js", seatsIndex);
    if (seatsIndex.length == 0) {
        alert("Please select seats");
        return;
    } else {
        var data = {
            data: seatsIndex,
            email: email,
            date: date,
            start: start,
            end: end,
            busname: busname,

        };
        $.ajax({
            type: "post",
            url: "book.php",
            data: data,
            success: function(data, dataType) {
                Swal.fire({
                    title: 'Success!',
                    text: 'Your seats are booked',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "home.php";
                    }
                })
            },
            error: function() {
                alert('Failed to send email.');
            }
        });
    }
}

function ha() {
    alert("handleseatchange");
}