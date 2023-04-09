@php
$allfooter = App\Models\Footer::find(1);
@endphp

  <footer class="footer">
  	 <div class="container">
  	 	<div class="row">
  	 		<div class="footer-col">
  	 			<h4>company</h4>
  	 			<ul>
  	 				<li><a href="{{ route('home.about')}}">about us</a></li>
  	 				<li><a href="{{ route('home.service')}}">our services</a></li>
  	 				<li><a href="{{ route('home.portfolio')}}">portfolio</a></li>
  	 				<li><a href="{{ route('home.blog')}}">blogs</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>get help</h4>
  	 			<ul>
  	 				<li><a href="{{ route('contact.me')}}">Contact Us</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>Our Address</h4>
  	 			<ul>
  	 				<li><a href="#">Lot 354, Jalan Megah Indah, Taman Alam Damai 43290 Selangor Malaysia</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>follow us</h4>
  	 			<div class="social-links">
  	 				<a href="#"><i class="fab fa-facebook-f"></i></a>
  	 				<a href="#"><i class="fab fa-twitter"></i></a>
  	 				<a href="#"><i class="fab fa-instagram"></i></a>
  	 				<a href="#"><i class="fab fa-linkedin-in"></i></a>
  	 			</div>
  	 		</div>
  	 	</div>
  	 </div>
  </footer>

</body>
</html>
