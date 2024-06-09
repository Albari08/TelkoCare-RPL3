import { memo, SVGProps } from 'react';

const Ellipse247Icon = (props: SVGProps<SVGSVGElement>) => (
  <svg preserveAspectRatio='none' viewBox='0 0 694 636' fill='none' xmlns='http://www.w3.org/2000/svg' {...props}>
    <ellipse cx={347} cy={318} rx={347} ry={318} fill='url(#paint0_linear_63_2427)' />
    <defs>
      <linearGradient
        id='paint0_linear_63_2427'
        x1={423}
        y1={79}
        x2={194.783}
        y2={475.569}
        gradientUnits='userSpaceOnUse'
      >
        <stop stopColor='white' />
        <stop offset={0.347749} stopColor='#FFB5B5' />
        <stop offset={1} stopColor='#FF0000' />
      </linearGradient>
    </defs>
  </svg>
);
const Memo = memo(Ellipse247Icon);
export { Memo as Ellipse247Icon };
