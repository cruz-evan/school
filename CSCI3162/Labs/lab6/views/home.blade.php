@extends('layouts.app')

@section('content')
<div class="ui inverted vertical masthead center aligned segment">
    <div class="ui container">
        <div class="ui text container">
			<h1 class="ui inverted header">
				RESTQL
			</h1>
			<h2 class="ui inverted header">Bringing Databases to You</h2>
			<div class="ui huge primary button">Learn How <i class="right arrow icon"></i></div>
		</div>
		<div class="ui vertical stripe segment">
		    <div class="ui equal width stackable internally celled grid container">
		    	<div class="row">
			        <div class="column">
				        <h3 class="ui inverted header">Don't Want to Sign Up? No Problem</h3>
				        <p>Using our unique system you can connect to databases without signing up.</p>
				        <a class= "item" href="{{ url('/connections/list') }}"><div class="ui green button">Connect To A Database</div></a>
			        </div>
			        <div class="column">
			        	<h3 class="ui inverted header">Login For Enhanced Features</h3>
			        	<p>Signing up allows you to access a few more helpful features that unregistered users cannot access</p>
			        	<a class= "item" href="{{ url('/login') }}"><div class="ui green button">Login</div></a>
			        </div>
		    	</div>
		    </div>
		</div>
    </div>
</div>
<div class="ui center aligned grid">
	<div class="twelve wide column">
		<div class="ui vertical stripe segment">
	    	<div class="ui text container">
        		<h1 class="ui black header">Content</h1>
        		<p>
        		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vestibulum est in risus luctus porta. Aenean ante orci, egestas at tellus sit amet, eleifend interdum justo. Vestibulum efficitur turpis urna, nec euismod nunc posuere in. Donec id euismod purus. Morbi ut enim urna. Proin euismod in nisl nec tempus. Duis imperdiet tempus sapien, at condimentum neque.

				Suspendisse ac tellus lectus. Pellentesque sapien est, mollis in condimentum at, feugiat nec sem. Aenean aliquam, lorem sed pellentesque porta, augue ex vehicula tellus, ut semper dui nulla malesuada purus. In et euismod sapien. Donec vitae tristique purus, et sagittis neque. Donec non elit sem. Vestibulum finibus malesuada ligula quis dignissim. Nunc eu quam vel urna mattis aliquam non at enim. Vivamus non ante tempor, ultrices odio a, dictum lorem. Ut quis tempus ligula.
        		</p>
        	<h4 class="ui horizontal header divider">
        		<a href="#">Content</a>
      		</h4>
      			<h1 class="ui black header">Content</h1>
        		<p>
        		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vestibulum est in risus luctus porta. Aenean ante orci, egestas at tellus sit amet, eleifend interdum justo. Vestibulum efficitur turpis urna, nec euismod nunc posuere in. Donec id euismod purus. Morbi ut enim urna. Proin euismod in nisl nec tempus. Duis imperdiet tempus sapien, at condimentum neque.

				Suspendisse ac tellus lectus. Pellentesque sapien est, mollis in condimentum at, feugiat nec sem. Aenean aliquam, lorem sed pellentesque porta, augue ex vehicula tellus, ut semper dui nulla malesuada purus. In et euismod sapien. Donec vitae tristique purus, et sagittis neque. Donec non elit sem. Vestibulum finibus malesuada ligula quis dignissim. Nunc eu quam vel urna mattis aliquam non at enim. Vivamus non ante tempor, ultrices odio a, dictum lorem. Ut quis tempus ligula.
        		</p>
        	<h4 class="ui horizontal header divider">
        		<a href="#">Content</a>
      		</h4>
      		<h1 class="ui black header">Content</h1>
        		<p>
        		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vestibulum est in risus luctus porta. Aenean ante orci, egestas at tellus sit amet, eleifend interdum justo. Vestibulum efficitur turpis urna, nec euismod nunc posuere in. Donec id euismod purus. Morbi ut enim urna. Proin euismod in nisl nec tempus. Duis imperdiet tempus sapien, at condimentum neque.

				Suspendisse ac tellus lectus. Pellentesque sapien est, mollis in condimentum at, feugiat nec sem. Aenean aliquam, lorem sed pellentesque porta, augue ex vehicula tellus, ut semper dui nulla malesuada purus. In et euismod sapien. Donec vitae tristique purus, et sagittis neque. Donec non elit sem. Vestibulum finibus malesuada ligula quis dignissim. Nunc eu quam vel urna mattis aliquam non at enim. Vivamus non ante tempor, ultrices odio a, dictum lorem. Ut quis tempus ligula.
        		</p>
        	<h4 class="ui horizontal header divider">
        		<a href="#">Content</a>
      		</h4>
      		<h1 class="ui black header">Content</h1>
        		<p>
        		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis vestibulum est in risus luctus porta. Aenean ante orci, egestas at tellus sit amet, eleifend interdum justo. Vestibulum efficitur turpis urna, nec euismod nunc posuere in. Donec id euismod purus. Morbi ut enim urna. Proin euismod in nisl nec tempus. Duis imperdiet tempus sapien, at condimentum neque.

				Suspendisse ac tellus lectus. Pellentesque sapien est, mollis in condimentum at, feugiat nec sem. Aenean aliquam, lorem sed pellentesque porta, augue ex vehicula tellus, ut semper dui nulla malesuada purus. In et euismod sapien. Donec vitae tristique purus, et sagittis neque. Donec non elit sem. Vestibulum finibus malesuada ligula quis dignissim. Nunc eu quam vel urna mattis aliquam non at enim. Vivamus non ante tempor, ultrices odio a, dictum lorem. Ut quis tempus ligula.
        		</p>
        	</div>
        </div>
    </div>
</div>
@endsection
