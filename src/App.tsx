import { useState } from 'react';
import { Mail, Phone, ArrowUpRight, Copy, Check } from 'lucide-react';
import CustomCursor from './CustomCursor';

function App() {
  const [copiedEmail, setCopiedEmail] = useState(false);

  const handleCopyEmail = () => {
    navigator.clipboard.writeText('harshit.gupta0411@gmail.com');
    setCopiedEmail(true);
    setTimeout(() => setCopiedEmail(false), 2000);
  };

  return (
    <div className="bg-ink min-h-screen text-bone font-sans antialiased selection:bg-ember/20 selection:text-ember">
      <CustomCursor />
      {/* Header */}
      <header className="fixed inset-x-0 top-0 z-40 border-b border-transparent backdrop-blur-md bg-ink/80">
        <nav className="mx-auto flex h-16 w-full max-w-6xl items-center justify-between px-6 sm:px-10">
          <a href="#" className="font-mono text-sm text-bone">
            HARSHIT<span className="text-ember">.</span>GUPTA
          </a>
          <div className="hidden items-center gap-8 md:flex">
            <a href="#about" className="group relative flex items-center gap-1.5 py-1 font-mono text-[0.8rem] text-muted transition-colors hover:text-bone">
              <span className="text-[0.62rem] tabular-nums text-muted">01</span>About
            </a>
            <a href="#projects" className="group relative flex items-center gap-1.5 py-1 font-mono text-[0.8rem] text-muted transition-colors hover:text-bone">
              <span className="text-[0.62rem] tabular-nums text-muted">02</span>Projects
            </a>
            <a href="#skills" className="group relative flex items-center gap-1.5 py-1 font-mono text-[0.8rem] text-muted transition-colors hover:text-bone">
              <span className="text-[0.62rem] tabular-nums text-muted">03</span>Skills
            </a>
            <a href="#experience" className="group relative flex items-center gap-1.5 py-1 font-mono text-[0.8rem] text-muted transition-colors hover:text-bone">
              <span className="text-[0.62rem] tabular-nums text-muted">04</span>Experience
            </a>
            <a href="/resume.pdf" target="_blank" className="hidden font-mono text-[0.8rem] text-muted transition-colors hover:text-bone md:inline-block">
              Résumé
            </a>
          </div>
          <div className="flex items-center gap-5">
            <a href="#contact" className="hidden rounded-md border border-line px-4 py-2 font-mono text-[0.8rem] text-bone transition-colors hover:border-ember hover:text-ember md:block">
              Get in touch
            </a>
          </div>
        </nav>
      </header>

      <main className="pt-24 pb-16">
        {/* Hero Section */}
        <section className="relative overflow-hidden pt-12 pb-24 sm:pt-24 sm:pb-32">
          {/* Subtle background glow mimicking the reference */}
          <div className="pointer-events-none absolute right-0 top-1/2 -z-10 h-[42rem] w-[42rem] -translate-y-1/2 translate-x-1/3 rounded-full bg-ember/10 blur-[120px]"></div>
          
          <div className="mx-auto w-full max-w-6xl px-6 sm:px-10">
            <div>
              <div className="flex items-center gap-3 font-mono text-xs text-muted">
                <span className="relative flex h-2 w-2">
                  <span className="absolute inline-flex h-full w-full animate-ping rounded-full bg-ember opacity-60"></span>
                  <span className="relative inline-flex h-2 w-2 rounded-full bg-ember"></span>
                </span>
                Open to Internships & Roles
              </div>
              
              <h1 className="mt-7 font-display text-[4rem] font-bold leading-[1] tracking-tight text-bone sm:text-[6rem] lg:text-[8rem]">
                HARSHIT<span className="text-ember">.</span><br/>GUPTA
              </h1>
              
              <p className="mt-7 max-w-xl text-[1.05rem] leading-relaxed text-bone-dim sm:text-lg">
                Passionate developer building high-performance full-stack web applications and machine learning models. I specialize in Data Science and love turning hard problems into seamless software.
              </p>
              
              <div className="mt-9 flex flex-wrap items-center gap-x-5 gap-y-3">
                <a href="#projects" className="group inline-flex items-center gap-2 rounded-md border border-ember/50 bg-ember/10 px-5 py-3 font-mono text-sm text-bone transition-colors hover:border-ember hover:bg-ember/20">
                  See the work
                  <ArrowUpRight className="h-4 w-4 transition-transform group-hover:-translate-y-0.5 group-hover:translate-x-0.5" />
                </a>
                <a href="#contact" className="group inline-flex items-center gap-1.5 px-1 py-3 font-mono text-sm text-muted transition-colors hover:text-bone">
                  Contact Me
                  <ArrowUpRight className="h-4 w-4 transition-transform group-hover:-translate-y-0.5 group-hover:translate-x-0.5" />
                </a>
              </div>
            </div>
          </div>
        </section>

        {/* About Section */}
        <section id="about" className="border-t border-line/60 py-24 sm:py-32 scroll-mt-20">
          <div className="mx-auto w-full max-w-6xl px-6 sm:px-10">
            <span className="inline-flex items-center gap-3 font-mono text-[0.7rem] uppercase tracking-[0.22em] text-muted">
              <span className="h-px w-7 bg-line"></span>about
            </span>
            <div className="mt-10 grid gap-12 lg:grid-cols-[1fr_2fr] items-start">
               {/* Left Column */}
               <div className="flex flex-col gap-6">
                  <div className="rounded-2xl border border-line bg-surface/50 p-6 flex flex-col gap-4">
                     <div className="flex justify-between border-b border-line pb-4 text-[0.7rem] font-mono">
                        <span className="text-muted uppercase">Based In</span>
                        <span className="text-bone text-right">Faridabad, Haryana, India</span>
                     </div>
                     <div className="flex justify-between pt-2 text-[0.7rem] font-mono">
                        <span className="text-muted uppercase">Studying</span>
                        <span className="text-bone text-right">B.Tech, Manipal University Jaipur</span>
                     </div>
                  </div>
               </div>
               
               {/* Right Column */}
               <div>
                 <h2 className="font-display text-[2rem] font-semibold leading-[1.2] tracking-tight text-bone sm:text-[2.5rem]">
                   I live in <span className="text-ember">Faridabad, Haryana, India</span>. I am pursuing my B.Tech from <span className="text-ember">Manipal University Jaipur</span>.
                 </h2>
                 <p className="mt-8 text-lg leading-relaxed text-bone-dim">
                   Most of what I build is the thing other people lean on. I learned early to ask the unglamorous questions first: what happens when this is under real load, with nobody watching. 
                 </p>
                 <p className="mt-6 text-lg leading-relaxed text-bone-dim">
                   I build software at every layer it lives on, from the screen people touch to the systems running quietly underneath.
                 </p>
               </div>
            </div>
          </div>
        </section>

        {/* Selected Work */}
        <section id="projects" className="border-t border-line/60 py-24 sm:py-32 scroll-mt-20">
          <div className="mx-auto w-full max-w-6xl px-6 sm:px-10">
            <div className="flex flex-wrap items-end justify-between gap-4">
              <div>
                <span className="inline-flex items-center gap-3 font-mono text-[0.7rem] uppercase tracking-[0.22em] text-muted">
                  <span className="h-px w-7 bg-line"></span>selected work
                </span>
                <h2 className="mt-5 max-w-xl font-display text-[2rem] font-semibold leading-[1.04] tracking-tight text-bone sm:text-[2.75rem]">
                  Things I've built.
                </h2>
              </div>
            </div>

            <div className="mt-12 grid gap-10 sm:grid-cols-2 lg:grid-cols-3">
              {/* Project 1 */}
              <a href="https://cinewatch-silk.vercel.app" target="_blank" rel="noopener noreferrer" className="group block">
                <div className="relative overflow-hidden rounded-xl border border-line bg-surface/50 shadow-sm transition-colors group-hover:border-line/80">
                  <div className="flex items-center gap-1.5 border-b border-line bg-ink/50 px-3.5 py-2.5">
                    <span className="flex items-center gap-1.5">
                      <span className="h-2.5 w-2.5 rounded-full bg-line"></span>
                      <span className="h-2.5 w-2.5 rounded-full bg-line"></span>
                      <span className="h-2.5 w-2.5 rounded-full bg-line"></span>
                    </span>
                    <span className="ml-3 truncate font-mono text-[0.65rem] text-muted">cinewatch-silk.vercel.app</span>
                  </div>
                  <div className="aspect-[16/10] bg-zinc-900/50 flex flex-col items-center justify-center p-6 text-center">
                     <div className="text-4xl mb-4">🎬</div>
                     <p className="text-sm text-muted font-mono">AI Full-Stack App</p>
                  </div>
                </div>
                <div className="mt-5 flex items-baseline justify-between gap-4">
                  <h3 className="font-display text-xl font-semibold text-bone transition-colors group-hover:text-ember">Cinematch</h3>
                </div>
                <p className="mt-1 text-sm text-bone-dim">Translates natural language moods into curated movie recommendations using Groq Cloud API LLMs.</p>
                <div className="mt-3 flex flex-wrap gap-2">
                  {['Next.js 16', 'Express', 'Groq API', 'Tailwind'].map(t => (
                    <span key={t} className="px-2 py-0.5 text-[0.65rem] font-mono rounded-md bg-surface border border-line text-muted">{t}</span>
                  ))}
                </div>
              </a>

              {/* Project 2 */}
              <a href="https://tidybit-nu.vercel.app" target="_blank" rel="noopener noreferrer" className="group block">
                <div className="relative overflow-hidden rounded-xl border border-line bg-surface/50 shadow-sm transition-colors group-hover:border-line/80">
                  <div className="flex items-center gap-1.5 border-b border-line bg-ink/50 px-3.5 py-2.5">
                    <span className="flex items-center gap-1.5">
                      <span className="h-2.5 w-2.5 rounded-full bg-line"></span>
                      <span className="h-2.5 w-2.5 rounded-full bg-line"></span>
                      <span className="h-2.5 w-2.5 rounded-full bg-line"></span>
                    </span>
                    <span className="ml-3 truncate font-mono text-[0.65rem] text-muted">tidybit-nu.vercel.app</span>
                  </div>
                  <div className="aspect-[16/10] bg-zinc-900/50 flex flex-col items-center justify-center p-6 text-center">
                     <div className="text-4xl mb-4">💻</div>
                     <p className="text-sm text-muted font-mono">DSA Learning Platform</p>
                  </div>
                </div>
                <div className="mt-5 flex items-baseline justify-between gap-4">
                  <h3 className="font-display text-xl font-semibold text-bone transition-colors group-hover:text-ember">TidyBit</h3>
                </div>
                <p className="mt-1 text-sm text-bone-dim">Coding platform with browser-based execution, AST-based intelligent hints, and real-time coding contests.</p>
                <div className="mt-3 flex flex-wrap gap-2">
                  {['React', 'Express.js', 'Supabase', 'Pyodide'].map(t => (
                    <span key={t} className="px-2 py-0.5 text-[0.65rem] font-mono rounded-md bg-surface border border-line text-muted">{t}</span>
                  ))}
                </div>
              </a>

              {/* Project 3 */}
              <a href="https://github.com/harshit-354/finance-tracker" target="_blank" rel="noopener noreferrer" className="group block">
                <div className="relative overflow-hidden rounded-xl border border-line bg-surface/50 shadow-sm transition-colors group-hover:border-line/80">
                  <div className="flex items-center gap-1.5 border-b border-line bg-ink/50 px-3.5 py-2.5">
                    <span className="flex items-center gap-1.5">
                      <span className="h-2.5 w-2.5 rounded-full bg-line"></span>
                      <span className="h-2.5 w-2.5 rounded-full bg-line"></span>
                      <span className="h-2.5 w-2.5 rounded-full bg-line"></span>
                    </span>
                    <span className="ml-3 truncate font-mono text-[0.65rem] text-muted">Expense Tracker</span>
                  </div>
                  <div className="aspect-[16/10] bg-zinc-900/50 flex flex-col items-center justify-center p-6 text-center">
                     <div className="text-4xl mb-4">💰</div>
                     <p className="text-sm text-muted font-mono">Client-side Web App</p>
                  </div>
                </div>
                <div className="mt-5 flex items-baseline justify-between gap-4">
                  <h3 className="font-display text-xl font-semibold text-bone transition-colors group-hover:text-ember">Expense Tracker</h3>
                </div>
                <p className="mt-1 text-sm text-bone-dim">Client-side application for recording, categorizing, and analyzing personal expenses with automatic summaries.</p>
                <div className="mt-3 flex flex-wrap gap-2">
                  {['React.js', 'JavaScript', 'CSS', 'LocalStorage'].map(t => (
                    <span key={t} className="px-2 py-0.5 text-[0.65rem] font-mono rounded-md bg-surface border border-line text-muted">{t}</span>
                  ))}
                </div>
              </a>
            </div>
          </div>
        </section>

        {/* What I Do / Skills */}
        <section id="skills" className="border-t border-line/60 py-24 sm:py-32 scroll-mt-20">
          <div className="mx-auto w-full max-w-6xl px-6 sm:px-10">
            <span className="inline-flex items-center gap-3 font-mono text-[0.7rem] uppercase tracking-[0.22em] text-muted">
              <span className="h-px w-7 bg-line"></span>what i do
            </span>
            <div className="mt-10 border-t border-line">
              <div className="grid gap-3 border-b border-line py-7 md:grid-cols-[1fr_1.8fr] md:gap-10">
                <h2 className="flex items-baseline gap-3 font-display text-lg font-semibold text-bone">
                  <span className="font-mono text-xs text-ember tabular-nums">01</span>Languages
                </h2>
                <p className="text-[0.97rem] leading-relaxed text-bone-dim">
                  Python, C++, JavaScript, HTML/CSS
                </p>
              </div>
              <div className="grid gap-3 border-b border-line py-7 md:grid-cols-[1fr_1.8fr] md:gap-10">
                <h2 className="flex items-baseline gap-3 font-display text-lg font-semibold text-bone">
                  <span className="font-mono text-xs text-ember tabular-nums">02</span>Frameworks/Libraries
                </h2>
                <p className="text-[0.97rem] leading-relaxed text-bone-dim">
                  React.js, Next.js, Node.js, Express.js, Pandas, NumPy, Matplotlib
                </p>
              </div>
              <div className="grid gap-3 border-b border-line py-7 md:grid-cols-[1fr_1.8fr] md:gap-10">
                <h2 className="flex items-baseline gap-3 font-display text-lg font-semibold text-bone">
                  <span className="font-mono text-xs text-ember tabular-nums">03</span>AI & Backend
                </h2>
                <p className="text-[0.97rem] leading-relaxed text-bone-dim">
                  Groq API, Pyodide, Supabase, MongoDB, LocalStorage
                </p>
              </div>
              <div className="grid gap-3 border-b border-line py-7 md:grid-cols-[1fr_1.8fr] md:gap-10">
                <h2 className="flex items-baseline gap-3 font-display text-lg font-semibold text-bone">
                  <span className="font-mono text-xs text-ember tabular-nums">04</span>Developer Tools
                </h2>
                <p className="text-[0.97rem] leading-relaxed text-bone-dim">
                  Git, GitHub, VS Code, Postman
                </p>
              </div>
              <div className="grid gap-3 border-b border-line py-7 md:grid-cols-[1fr_1.8fr] md:gap-10">
                <h2 className="flex items-baseline gap-3 font-display text-lg font-semibold text-bone">
                  <span className="font-mono text-xs text-ember tabular-nums">05</span>Coursework
                </h2>
                <p className="text-[0.97rem] leading-relaxed text-bone-dim">
                  Data Structures & Algorithms, Object-Oriented Programming, DBMS, Operating Systems
                </p>
              </div>
            </div>
          </div>
        </section>

        {/* Experience / Currently */}
        <section id="experience" className="border-t border-line/60 py-24 sm:py-32 scroll-mt-20">
          <div className="mx-auto w-full max-w-6xl px-6 sm:px-10 flex flex-col gap-8 sm:flex-row sm:items-start sm:justify-between">
            <div className="max-w-2xl">
              <span className="inline-flex items-center gap-3 font-mono text-[0.7rem] uppercase tracking-[0.22em] text-muted">
                <span className="h-px w-7 bg-line"></span>currently & previously
              </span>
              
              <div className="mt-12 flex flex-col gap-12">
                <div>
                  <h2 className="font-display text-2xl font-semibold tracking-tight text-bone sm:text-3xl">
                    Software Development Intern at <span className="text-ember">IT4T Solutions</span>.
                  </h2>
                  <div className="mt-3 font-mono text-xs text-muted">2025</div>
                  <ul className="mt-5 list-disc pl-4 text-[0.95rem] text-bone-dim space-y-2 leading-relaxed">
                    <li>Gained hands-on exposure to software development workflows and technology solutions within the travel technology industry.</li>
                    <li>Worked with software requirements, application workflows, debugging, collaboration, and software development lifecycle practices.</li>
                  </ul>
                </div>
                
                <div>
                  <h2 className="font-display text-2xl font-semibold tracking-tight text-bone sm:text-3xl">
                    B.Tech. Computer Science <span className="text-bone-dim text-xl font-normal">(Data Science)</span>
                  </h2>
                  <div className="mt-3 font-mono text-xs text-muted flex items-center gap-2">
                    Manipal University Jaipur <span className="h-1 w-1 rounded-full bg-line"></span> 2023 - 2027
                  </div>
                </div>

                <div>
                  <h2 className="font-display text-2xl font-semibold tracking-tight text-bone sm:text-3xl">
                    All India Senior School Certificate Examination <span className="text-bone-dim text-xl font-normal">(Class XII)</span>
                  </h2>
                  <div className="mt-3 font-mono text-xs text-muted flex items-center gap-2">
                    Delhi Public School, Faridabad <span className="h-1 w-1 rounded-full bg-line"></span> 2022
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        {/* Resume Section */}
        <section id="resume" className="border-t border-line/60 py-24 sm:py-32 scroll-mt-20">
          <div className="mx-auto w-full max-w-6xl px-6 sm:px-10">
            <span className="inline-flex items-center gap-3 font-mono text-[0.7rem] uppercase tracking-[0.22em] text-muted">
              <span className="h-px w-7 bg-line"></span>résumé
            </span>
            <div className="mt-10 grid gap-12 lg:grid-cols-[1fr_1fr] items-center">
              <div>
                <h2 className="font-display text-[2rem] font-semibold leading-[1.2] tracking-tight text-bone sm:text-[2.5rem]">
                  A detailed log of my <span className="text-ember">academic & professional</span> journey.
                </h2>
                <p className="mt-6 text-lg leading-relaxed text-bone-dim">
                  Available for download as a PDF document. Includes detailed information on my education, work experience, projects, and technical skills.
                </p>
              </div>
              <div className="flex justify-center lg:justify-end">
                <a 
                  href="/resume.pdf" 
                  download="Harshit_Gupta_Resume.pdf"
                  className="group relative inline-flex h-40 w-full max-w-sm flex-col items-center justify-center gap-4 overflow-hidden rounded-2xl border border-line bg-surface/30 transition-colors hover:border-ember/50 hover:bg-surface"
                >
                   <div className="absolute inset-0 -z-10 bg-[radial-gradient(circle_at_center,rgba(255,77,77,0.1)_0,transparent_50%)] opacity-0 transition-opacity group-hover:opacity-100"></div>
                   <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round" className="text-muted transition-colors group-hover:text-ember">
                     <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                     <polyline points="7 10 12 15 17 10"></polyline>
                     <line x1="12" y1="15" x2="12" y2="3"></line>
                   </svg>
                   <span className="font-mono text-sm text-bone">Download Résumé</span>
                   <span className="font-mono text-[0.65rem] text-muted">PDF Document</span>
                </a>
              </div>
            </div>
          </div>
        </section>

        {/* Contact Me */}
        <section id="contact" className="border-t border-line/60 py-28 sm:py-36 scroll-mt-20">
          <div className="mx-auto w-full max-w-6xl px-6 sm:px-10 text-center">
            <h2 className="font-display text-balance text-[2rem] font-semibold leading-[1.04] tracking-tight text-bone sm:text-[2.75rem] mx-auto max-w-2xl">
              Let's build something together.
            </h2>
            <p className="mx-auto mt-5 max-w-md text-bone-dim">
              Open to new-grad roles, internships, and problems worth the effort.
            </p>
            
            <div className="mt-12 flex flex-col items-center justify-center gap-4 sm:flex-row sm:gap-6">
              <a href="mailto:harshit.gupta0411@gmail.com" className="group flex w-full max-w-[280px] items-center gap-4 rounded-xl border border-line bg-surface/30 p-4 transition-colors hover:border-ember hover:bg-ember/5 sm:w-auto">
                <div className="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-ink border border-line group-hover:border-ember/30 group-hover:text-ember">
                  <Mail className="h-4 w-4" />
                </div>
                <div className="text-left">
                  <div className="font-mono text-xs text-muted">Email</div>
                  <div className="text-sm font-medium text-bone transition-colors group-hover:text-ember">harshit.gupta0411@gmail.com</div>
                </div>
              </a>

              <a href="tel:+917827113817" className="group flex w-full max-w-[280px] items-center gap-4 rounded-xl border border-line bg-surface/30 p-4 transition-colors hover:border-ember hover:bg-ember/5 sm:w-auto">
                <div className="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-ink border border-line group-hover:border-ember/30 group-hover:text-ember">
                  <Phone className="h-4 w-4" />
                </div>
                <div className="text-left">
                  <div className="font-mono text-xs text-muted">Mobile</div>
                  <div className="text-sm font-medium text-bone transition-colors group-hover:text-ember">+91 78271 13817</div>
                </div>
              </a>
            </div>

            <div className="mt-8">
              <button 
                onClick={handleCopyEmail}
                className="inline-flex items-center gap-2 font-mono text-xs text-muted transition-colors hover:text-bone"
              >
                {copiedEmail ? <Check className="h-3 w-3 text-emerald-400" /> : <Copy className="h-3 w-3" />}
                {copiedEmail ? 'Email copied to clipboard' : 'Copy email address'}
              </button>
            </div>
          </div>
        </section>
      </main>

      {/* Footer */}
      <footer className="border-t border-line py-12">
        <div className="mx-auto w-full max-w-6xl px-6 sm:px-10">
          <div className="flex flex-col gap-8 sm:flex-row sm:items-start sm:justify-between">
            <div>
              <div className="font-mono text-sm text-bone">
                HARSHIT<span className="text-ember">.</span>GUPTA
              </div>
              <p className="mt-2 font-mono text-xs text-muted">
                Software developer <br />
                Faridabad, Haryana
              </p>
            </div>
            
            <div className="flex gap-5 font-mono text-xs">
              <a href="https://github.com/harshit-354" target="_blank" rel="noopener noreferrer" className="text-muted transition-colors hover:text-bone">
                GitHub
              </a>
              <a href="https://www.linkedin.com/in/harshit-gupta-1106a621a/" target="_blank" rel="noopener noreferrer" className="text-muted transition-colors hover:text-bone">
                LinkedIn
              </a>
            </div>
          </div>
          
          <div className="mt-10 flex flex-col gap-2 border-t border-line pt-6 font-mono text-[0.7rem] text-muted sm:flex-row sm:items-center sm:justify-between">
            <div>© {new Date().getFullYear()} Harshit Gupta</div>
            <div>Built with React, TypeScript & Tailwind CSS</div>
          </div>
        </div>
      </footer>
    </div>
  );
}

export default App;
