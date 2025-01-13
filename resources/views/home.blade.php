<x-app-layout>
    <div class="w-full sm:max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-sky-900 overflow-hidden shadow-sm sm:rounded-lg">
            @auth
                <x-welcome-message
                    title="Welcome back to <span class='text-teal-300'>Ultimate League!</span> Ready to manage?"
                    subtitle="It's great to have you back! As a returning user, you're already familiar with how Ultimate League can simplify your sports management tasks. Let's continue where you left off and make your sports management experience even better."
                    registerMessage="Dive right back into managing your leagues, teams, and games. Remember, new features and improvements are being added regularly to enhance your experience with Ultimate League, and if you need anything, feel free to contact our support team. Enjoy the seamless sports management journey." />
            @endauth
            @guest
                <x-welcome-message
                    title="Get started with <span class='text-teal-300'>the world's #1</span> League Manager APP."
                    subtitle="Welcome to Ultimate League, your go-to platform for creating and managing leagues, teams, and fixtures with ease. With our intuitive interface and powerful features, you can organize your sports leagues efficiently and focus on what matters – the game. Whether you're a sports enthusiast, coach, or league administrator, Ultimate League simplifies the process, letting you concentrate on the excitement of the game. Join us and experience the seamless blend of technology and sports management today."
                    registerMessage="To start creating and managing your own leagues, teams, and games, register for a free account today. Experience the power and convenience of Ultimate League." />
            @endguest
        </div>
    </div>
</x-app-layout>
