<template>

  <Head>
    <title>{{ errorTitle }} - Dimension Technologies Systems</title>
  </Head>
  <div class="error-page">
    <div class="error-container">
      <div class="error-content">
        <div class="error-icon">
          <img src="@/images/icons/not-found.svg" alt="404 Error" />
        </div>
        <h1>404</h1>
        <h2>{{ errorTitle }}</h2>
        <p>{{ errorDescription }}</p>
        <div class="error-actions">
          <Link href="/" class="home-btn">
          <span class="icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path
                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </span>
          Back to Home
          </Link>
          <button @click="goBack" class="back-btn">
            <span class="icon">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </span>
            Go Back
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { useContent } from '~/js/composables/useContent';

const { getContent } = useContent();

const errorTitle = getContent('error', '404_title', 'Oops! Page Not Found', {
  type: 'text',
  description: '404 page title'
});

const errorDescription = getContent('error', '404_description', 'The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', {
  type: 'text',
  description: '404 page description'
});

const goBack = () => {
  window.history.back();
};
</script>

<style lang="scss" scoped>
.error-page {
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(135deg, #f5f7fa 0%, #e4e8eb 100%);
  padding: 3rem 1rem;
}

.error-container {
  max-width: 600px;
  width: 100%;
  text-align: center;
  background: white;
  padding: 3rem 2rem;
  border-radius: 16px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  animation: fadeIn 0.5s ease-out;
}

.error-content {
  .error-icon {
    width: 180px;
    height: 180px;
    margin: 0 auto 2rem;
    animation: float 6s ease-in-out infinite;

    img {
      width: 100%;
      height: 100%;
      object-fit: contain;
    }
  }

  h1 {
    font-size: 5rem;
    font-weight: 700;
    color: #002B7F;
    margin: 0;
    line-height: 1;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
  }

  h2 {
    font-size: 2rem;
    font-weight: 600;
    color: #333;
    margin: 1rem 0;
  }

  p {
    color: #666;
    font-size: 1.1rem;
    line-height: 1.6;
    margin-bottom: 2rem;
    max-width: 400px;
    margin-left: auto;
    margin-right: auto;
  }
}

.error-actions {
  display: flex;
  gap: 1rem;
  justify-content: center;
  margin-top: 2rem;

  .home-btn,
  .back-btn {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    font-weight: 500;
    transition: all 0.3s ease;
    text-decoration: none;
    border: none;
    cursor: pointer;
    font-size: 1rem;

    .icon {
      width: 20px;
      height: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
  }

  .home-btn {
    background: #002B7F;
    color: white;

    &:hover {
      background: #002B7F;
      transform: translateY(-2px);
    }
  }

  .back-btn {
    background: white;
    color: #002B7F;
    border: 2px solid #002B7F;

    &:hover {
      background: rgba(0, 43, 127, 0.1);
      transform: translateY(-2px);
    }
  }
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }

  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes float {
  0% {
    transform: translateY(0px);
  }

  50% {
    transform: translateY(-20px);
  }

  100% {
    transform: translateY(0px);
  }
}

@media (max-width: 768px) {
  .error-container {
    padding: 2rem 1.5rem;
  }

  .error-content {
    .error-icon {
      width: 140px;
      height: 140px;
    }

    h1 {
      font-size: 4rem;
    }

    h2 {
      font-size: 1.75rem;
    }

    p {
      font-size: 1rem;
    }
  }
}

@media (max-width: 480px) {
  .error-actions {
    flex-direction: column;
    gap: 1rem;

    .home-btn,
    .back-btn {
      width: 100%;
      justify-content: center;
    }
  }

  .error-content {
    .error-icon {
      width: 120px;
      height: 120px;
    }

    h1 {
      font-size: 3rem;
    }

    h2 {
      font-size: 1.5rem;
    }
  }
}
</style>