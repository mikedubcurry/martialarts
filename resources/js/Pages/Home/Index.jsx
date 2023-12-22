import { useState } from 'react'
import { Link } from '@inertiajs/react'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout'
import ViewSessionModal from './Partials/ViewSessionModal'

export default function Home({ gyms, disciplines, user }) {
    const [selectedSession, setSelectedSession] = useState(null)
    return (
        <AuthenticatedLayout user={user}>
            <div className=''>
                <Link href='/sessions/create' className='w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'>Record New Session</Link>
            </div>

            <div className='mt-4'>
                <h2 className='text-2xl font-bold'>Past Sessions</h2>
                <div className=''>
                    <ul className=''>
                        {user.gym_sessions.map((session) => (
                            <li className='flex justify-between items-center border-b py-2 hover:bg-gray-50' key={session.id} onClick={() => setSelectedSession(session)}>
                                <div className='flex items-center gap-4'>
                                    <p>{session.date}</p>
                                    <p>{session.discipline.discipline}</p>
                                    <p>{session.start_time}</p>
                                    <p>{session.end_time}</p>
                                </div>
                            </li>
                        ))}
                    </ul>
                </div>
            </div>
            <div className='mt-4'>
                <h2 className='text-2xl font-bold'>Recovery</h2>
                <div className=''>
                    <ul className=''>
                        {user.recoveries.map((recovery) => (
                            <li className='flex justify-between items-center border-b py-2 hover:bg-gray-50' key={recovery.id}>
                                <div className='flex items-center gap-4'>
                                    <p>{recovery.date}</p>
                                    <p>{recovery.type}</p>
                                    <p>{recovery.notes}</p>
                                </div>
                            </li>
                        ))}
                    </ul>
                </div>
            </div>
            <div className='mt-4'>
                <h2 className='text-2xl font-bold'>Explore Martial Arts</h2>
                <div className=''>
                    <ul className=''>
                        {disciplines.map((discipline) => (
                            <li className='flex justify-between items-center border-b py-2 hover:bg-gray-50' key={discipline.id}>
                                <div className='w-full flex justify-between items-center gap-4'>
                                    <p>{discipline.discipline}</p>
                                    <button className='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'>Find a Gym</button>
                                </div>
                            </li>
                        ))}
                    </ul>
                </div>
            </div>
            {selectedSession && (
                <ViewSessionModal session={selectedSession} close={() => setSelectedSession(null)}/>
            )}
        </AuthenticatedLayout>
    )
}
