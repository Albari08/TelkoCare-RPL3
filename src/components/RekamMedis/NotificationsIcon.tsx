import { memo, SVGProps } from 'react';

const NotificationsIcon = (props: SVGProps<SVGSVGElement>) => (
  <svg preserveAspectRatio='none' viewBox='0 0 50 48' fill='none' xmlns='http://www.w3.org/2000/svg' {...props}>
    <g clipPath='url(#clip0_63_2424)'>
      <path
        d='M25 43.5417C27.2917 43.5417 29.1667 41.7604 29.1667 39.5833H20.8333C20.8333 41.7604 22.7083 43.5417 25 43.5417ZM37.5 31.6667V21.7708C37.5 15.6948 34.1042 10.6083 28.125 9.2625V7.91667C28.125 6.27396 26.7292 4.94792 25 4.94792C23.2708 4.94792 21.875 6.27396 21.875 7.91667V9.2625C15.9167 10.6083 12.5 15.675 12.5 21.7708V31.6667L8.33333 35.625V37.6042H41.6667V35.625L37.5 31.6667ZM33.3333 33.6458H16.6667V21.7708C16.6667 16.8625 19.8125 12.8646 25 12.8646C30.1875 12.8646 33.3333 16.8625 33.3333 21.7708V33.6458Z'
        fill='#FF1010'
      />
    </g>
    <defs>
      <clipPath id='clip0_63_2424'>
        <rect width={50} height={47.5} fill='white' />
      </clipPath>
    </defs>
  </svg>
);
const Memo = memo(NotificationsIcon);
export { Memo as NotificationsIcon };
