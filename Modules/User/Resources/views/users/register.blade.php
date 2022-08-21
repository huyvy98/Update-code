
    <div class="header">
        <div class="header-main">
            <h1>Impress Login</h1>
            <div class="header-bottom">
                <div class="header-right w3agile">

                    <div class="header-left-bottom agileinfo">

                        <form action="{{route('user.register')}}" method="POST">
                            <input type="text" value="" name="firstname" placeholder="Firstname">
                            <input type="text" value="" name="lastname" placeholder="Lastname">
                            <input type="text" value="" name="address" placeholder="address">
                            <input type="email" value="" name="email" placeholder="email">
                            <input type="number" value="" name="phone" placeholder="phone">
                            <input type="password" value="" name="password" placeholder="Password">
                            <input type="password" value="" name="password_conf" placeholder="Password Confirm">
                            @csrf
                            <input type="submit" value="Register">
                        </form>
                        <div class="home text-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
