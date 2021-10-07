<template>
  <svg class="" viewBox="0 0 364 364" fill="none" xmlns="http://www.w3.org/2000/svg" v-if="type==='solid'">
    <circle cx="182.5" cy="182.5" r="169.5" :fill="color"/>
    <circle cx="182.5" cy="182.5" r="169.5" fill="url(#paint0_linear)"/>
    <ellipse cx="279.093" cy="135.803" rx="47.5" ry="63.5" transform="rotate(-30.3821 279.093 135.803)" fill="#F4EEDF"/>
    <defs>
      <linearGradient id="paint0_linear" x1="285" y1="36.5" x2="88.5" y2="324" gradientUnits="userSpaceOnUse">
        <stop stop-color="white" stop-opacity="0.7"/>
        <stop offset="1" stop-color="white" stop-opacity="0"/>
      </linearGradient>
    </defs>
  </svg>
  <svg class="" viewBox="0 0 364 364" fill="none" xmlns="http://www.w3.org/2000/svg" v-else>
    <circle cx="182.5" cy="182.5" r="169.5" fill="#F4EEDF"/>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.0854 187.936C46.4706 162.365 84.3613 137.027 125.597 113.22C177.559 83.2198 228.969 59.0345 276.419 41.3773C321.983 71.7616 352 123.625 352 182.5C352 186.619 351.853 190.704 351.564 194.749C318.274 209.303 280.134 228.624 240.519 251.494C189.738 280.811 145.219 310.944 112.739 337.024C55.4802 311.134 15.1779 254.353 13.0854 187.936Z" :fill="color"/>
    <ellipse cx="279.093" cy="135.803" rx="47.5" ry="63.5" transform="rotate(-30.3821 279.093 135.803)" fill="#F4EEDF"/>
    <circle cx="182.5" cy="182.5" r="169.5" fill="url(#paint0_linear)"/>
    <defs>
      <linearGradient id="paint0_linear" x1="285" y1="36.5" x2="88.5" y2="324" gradientUnits="userSpaceOnUse">
        <stop stop-color="white" stop-opacity="0.7"/>
        <stop offset="1" stop-color="white" stop-opacity="0"/>
      </linearGradient>
    </defs>
  </svg>


</template>

<script>
export default {
  name: "PoolBall",
  props: {
    type: {
      required: false,
      default: 'solid'
    },
    color: {
      required: false,
      default: '#ff0099'
    }
  }
};
</script>
