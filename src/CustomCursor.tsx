import { useEffect, useState } from 'react';

export default function CustomCursor() {
  const [mousePosition, setMousePosition] = useState({ x: 0, y: 0 });
  const [isHovering, setIsHovering] = useState(false);
  const [isVisible, setIsVisible] = useState(false);

  useEffect(() => {
    const updateMousePosition = (e: MouseEvent) => {
      setMousePosition({ x: e.clientX, y: e.clientY });
      if (!isVisible) setIsVisible(true);
    };
    
    const handleMouseOver = (e: MouseEvent) => {
      const target = e.target as HTMLElement;
      if (
        target.tagName.toLowerCase() === 'a' ||
        target.tagName.toLowerCase() === 'button' ||
        target.closest('a') ||
        target.closest('button') ||
        window.getComputedStyle(target).cursor === 'pointer'
      ) {
        setIsHovering(true);
      } else {
        setIsHovering(false);
      }
    };

    const handleMouseLeave = () => setIsVisible(false);
    const handleMouseEnter = () => setIsVisible(true);

    window.addEventListener('mousemove', updateMousePosition);
    window.addEventListener('mouseover', handleMouseOver);
    document.addEventListener('mouseleave', handleMouseLeave);
    document.addEventListener('mouseenter', handleMouseEnter);

    return () => {
      window.removeEventListener('mousemove', updateMousePosition);
      window.removeEventListener('mouseover', handleMouseOver);
      document.removeEventListener('mouseleave', handleMouseLeave);
      document.removeEventListener('mouseenter', handleMouseEnter);
    };
  }, [isVisible]);

  // Hide on touch devices
  if (typeof window !== 'undefined' && window.matchMedia('(pointer: coarse)').matches) {
    return null;
  }

  return (
    <>
      <div 
        className="fixed top-0 left-0 w-2 h-2 bg-ember rounded-full pointer-events-none z-[9999] transition-transform duration-75 ease-out"
        style={{ 
          transform: `translate(${mousePosition.x}px, ${mousePosition.y}px) translate(-50%, -50%) ${isHovering ? 'scale(0)' : 'scale(1)'}`,
          opacity: isVisible ? 1 : 0
        }}
      />
      <div 
        className="fixed top-0 left-0 w-8 h-8 rounded-full pointer-events-none z-[9998] transition-all duration-300 ease-out flex items-center justify-center"
        style={{ 
          transform: `translate(${mousePosition.x}px, ${mousePosition.y}px) translate(-50%, -50%) ${isHovering ? 'scale(1.5)' : 'scale(1)'}`,
          border: isHovering ? '1px solid var(--color-ember)' : '1px solid var(--color-muted)',
          backgroundColor: isHovering ? 'rgba(255, 77, 77, 0.1)' : 'transparent',
          opacity: isVisible ? 1 : 0
        }}
      />
    </>
  );
}
