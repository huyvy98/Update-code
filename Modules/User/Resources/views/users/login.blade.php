<div class="header">
    <div class="header-main">
        <div class="header-bottom">
            <div class="header-right w3agile">
                <div class="header-left-bottom agileinfo">
                    <form action="" method="POST">
                        <input type="email" value="" name="email" placeholder="Email">
                        @error('email')
                        <span style="color: #ff8888; font-size: 14px">{{ $message }}</span>
                        @enderror
                        <input type="password" value="" name="password" placeholder="Password">
                        @error('password')
                        <span style="color: #ff8888; font-size: 14px">{{ $message }}</span>
                        @enderror
                        <div class="remember">
                             <span class="checkbox1">
                                   <label class="checkbox"><input type="checkbox" name="" checked=""><i> </i>Remember me</label>
                             </span>
                            <div class="forgot">
                                <h6><a href="#">Forgot Password?</a></h6>
                            </div>
                            <div class="clear"></div>
                        </div>
                        @csrf
                        <input type="submit" value="Login">
                    </form>
                    <div class="home text-center">
{{--                        <a href="{{route('user.index')}}">Quay lại trang chủ</a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
