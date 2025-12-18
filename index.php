<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connect Atomberg Account</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gray-100 dark:bg-[#0b0b0b] flex flex-col items-center justify-center p-4 sm:p-6">

  <div class="w-full max-w-md bg-white dark:bg-[#161616] rounded-2xl shadow-xl overflow-hidden transition-all duration-300">
    
    <div class="h-2 w-full bg-yellow-400"></div>

    <div class="p-6 sm:p-8">
      <header class="mb-8">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white tracking-tight">
          Connect Atomberg
        </h1>
        <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">
          Enter your API credentials to access your smart devices.
        </p>
      </header>

      <form action="api/connect.php" method="POST" class="space-y-5">

        <div class="group">
          <label for="api_key" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5 transition-colors group-focus-within:text-yellow-500">
            API Key
          </label>
          <input
            type="text"
            id="api_key"
            name="api_key"
            placeholder="eg. demo_api_key_123"
            required
            class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700
                   bg-gray-50 dark:bg-[#0f0f0f] text-gray-900 dark:text-white text-base
                   focus:outline-none focus:ring-2 focus:ring-yellow-400/50 focus:border-yellow-400
                   transition-all placeholder:text-gray-400 dark:placeholder:text-gray-600"
          />
        </div>

        <div class="group">
          <label for="refresh_token" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5 transition-colors group-focus-within:text-yellow-500">
            Refresh Token
          </label>
          <input
            type="password"
            id="refresh_token"
            name="refresh_token"
            placeholder="••••••••••••••••"
            required
            class="w-full px-4 py-3 rounded-xl border border-gray-300 dark:border-gray-700
                   bg-gray-50 dark:bg-[#0f0f0f] text-gray-900 dark:text-white text-base
                   focus:outline-none focus:ring-2 focus:ring-yellow-400/50 focus:border-yellow-400
                   transition-all placeholder:text-gray-400 dark:placeholder:text-gray-600"
          />
        </div>

        <button
          type="submit"
          class="w-full py-3.5 mt-4 rounded-xl bg-yellow-400 hover:bg-yellow-500 active:scale-[0.98]
                 text-black font-bold text-lg shadow-lg shadow-yellow-400/20
                 transition-all duration-200">
          Connect Account
        </button>
      </form>

      <footer class="mt-8">
        <div class="p-4 rounded-xl bg-gray-50 dark:bg-black/40 border border-gray-200 dark:border-gray-800">
          <div class="flex items-start gap-3">
            <span class="text-lg">ℹ️</span>
            <p class="text-xs text-gray-500 dark:text-gray-400 leading-relaxed">
              <b>Note:</b> Demo credentials for evaluation are available in the 
              <a href="#" class="text-yellow-600 dark:text-yellow-500 hover:underline font-medium">GitHub README</a>.
            </p>
          </div>
        </div>
      </footer>
    </div>
  </div>

</body>
</html>