<form action="{{ route('event.update', $event->id) }}" method="POST">
    @call_user_func@method('PUT')


    <!-- Tabel ticket merupakan anak dari table event, satu event bisa memiliki banyak
ticket yang berarti ketika ingin melakukan create atau edit pada ticket memerlukan
dropdown untuk memilih event mana yang memiliki ticket yang akan  -->