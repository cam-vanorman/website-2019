<section
	x-data="navMenu.slideout()"
	x-cloak
	@open-menu.window="open = $event.detail.open"
	@keydown.window.tab="usedKeyboard = true"
	@keydown.escape="open = false"
	x-init="init()">
	<div
		x-show.transition.opacity.duration.500="open"
		@click="open = false"
		class="fixed inset-0 bg-black bg-opacity-25 z-50"></div>
	<div
		class="nav-menu transition shadow-2xl"
		:class="{'translate-x-full': !open}">
		<button
			@click="open = false"
			x-ref="closeButton"
			:class="{'focus:outline-none': !usedKeyboard}"
			class="absolute top-0 right-0 mr-4 mt-2">
            <span class="text-xs text-gray-100 pr-2 uppercase">Close Menu</span>
            <svg
                class="inline-block fill-current text-gray-100 h-9 w-4"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 36 30"
            >
                <polygon points="32.8,4.4 28.6,0.2 18,10.8 7.4,0.2 3.2,4.4 13.8,15 3.2,25.6 7.4,29.8 18,19.2 28.6,29.8 32.8,25.6 22.2,15 "/>
            </svg>
        </button>

        <nav class="py-16">
            <ul class="list-reset mb-3">
                <li>
                    <a
                        title="{{ $pages->projects->title }}"
                        href="/{{ $pages->projects->getUrl() }}"
                        class="nav-menu__item transition duration-300"
                    >{{ $pages->projects->title }}</a>
                    <ul class="mb-3">
                        @foreach($projects as $project)
                            <li>
                                <a
                                    title="{{ $project->title }}"
                                    href="{{ $project->getUrl() }}"
                                    class="nav-menu__item py-2 text-sm transition duration-300"
                                >{{ $project->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a
                        title="Contact Me"
                        href="/contact"
                        class="nav-menu__item transition duration-300"
                    >Contact Me</a>
                </li>
            </ul>
        </nav>
        <div class="absolute bottom-0 left-0 right-0 p-6">
            <p class="mb-0 mx-auto text-steel-blue text-center text-xs">&copy; {{ $page->site['name'] }}</p>
        </div>
	</div>
</section>