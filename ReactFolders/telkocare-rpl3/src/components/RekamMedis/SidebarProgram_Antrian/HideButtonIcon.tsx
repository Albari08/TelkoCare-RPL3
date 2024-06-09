import { memo, SVGProps } from 'react';

const HideButtonIcon = (props: SVGProps<SVGSVGElement>) => (
  <svg preserveAspectRatio='none' viewBox='0 0 32 32' fill='none' xmlns='http://www.w3.org/2000/svg' {...props}>
    <g filter='url(#filter0_d_63_2502)'>
      <circle cx={16} cy={16} r={16} transform='matrix(-1 0 0 1 32 0)' fill='#FF0000' />
    </g>
    <path
      d='M17.724 23.6093L10.1147 16L17.724 8.39066L19.6093 10.276L13.8853 16L19.6093 21.724L17.724 23.6093Z'
      fill='white'
    />
    <defs>
      <filter
        id='filter0_d_63_2502'
        x={-2}
        y={-1}
        width={36}
        height={36}
        filterUnits='userSpaceOnUse'
        colorInterpolationFilters='sRGB'
      >
        <feFlood floodOpacity={0} result='BackgroundImageFix' />
        <feColorMatrix
          in='SourceAlpha'
          type='matrix'
          values='0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0'
          result='hardAlpha'
        />
        <feOffset dy={1} />
        <feGaussianBlur stdDeviation={1} />
        <feColorMatrix type='matrix' values='0 0 0 0 0.0503472 0 0 0 0 0.0735207 0 0 0 0 0.120833 0 0 0 0.12 0' />
        <feBlend mode='normal' in2='BackgroundImageFix' result='effect1_dropShadow_63_2502' />
        <feBlend mode='normal' in='SourceGraphic' in2='effect1_dropShadow_63_2502' result='shape' />
      </filter>
    </defs>
  </svg>
);
const Memo = memo(HideButtonIcon);
export { Memo as HideButtonIcon };
