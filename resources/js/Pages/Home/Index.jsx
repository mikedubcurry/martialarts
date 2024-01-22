import { useEffect, useState } from 'react'
import { Link } from '@inertiajs/react'
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout'
import ViewSessionModal from './Partials/ViewSessionModal'
import DisciplineModal from './Partials/DisciplineModal'
import SectionList from './Partials/SectionList'

export default function Home({ gyms, disciplines, user }) {
    const [selectedSession, setSelectedSession] = useState(null)
    const [selectedDiscipline, setSelectedDiscipline] = useState(null)

    useEffect(() => {
        if (selectedSession) {
            setSelectedDiscipline(null)
        }
    }, [selectedSession, selectedDiscipline])

    const gymSessions = user.gym_sessions.map((session) => {
        return {
            ...session,
            discipline: session.discipline.discipline,
        }
    })

    return (
        <AuthenticatedLayout user={user}>
            <div className='flex gap-4 my-8'>
                <span className=''>
                    <Link href='/sessions/create' className='w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'>Record New Session</Link>
                </span>
                <span className=''>
                    <Link href='/recoveries/create' className='w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'>Record New Recovery</Link>
                </span>
            </div>

            <div>filter by: <div>discipline</div></div>
            <div className='border border-blue-500 rounded-md px-8 pb-8 mb-8'>
                <SectionList data={gymSessions} title='Training Sessions' keys={['date', 'discipline', 'start_time', 'end_time']} setSelectedItem={setSelectedSession} />
            </div>

            <div className='border border-blue-500 rounded-md px-8 pb-8 mb-8'>
                <SectionList data={user.recoveries} title='Recovery' keys={['date', 'type', 'notes']} setSelectedItem={() => { }} />
            </div>

            <div className='border border-blue-500 rounded-md px-8 pb-8 mb-8'>
                <h2 className='text-2xl font-bold'>Explore Martial Arts</h2>
                <div className=''>
                    <ul className=''>
                        {disciplines.map((discipline) => (
                            <li className='flex justify-between items-center border-b py-2 hover:bg-gray-50' key={discipline.id}>
                                <div className='w-full flex justify-between items-center gap-4'>
                                    <p>{discipline.discipline}</p>
                                    <Link href={"/gyms/search?discipline=" + discipline.discipline} className='bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'>Find a Gym</Link>
                                </div>
                            </li>
                        ))}
                    </ul>
                </div>
            </div>
            {selectedSession && (
                <ViewSessionModal session={selectedSession} close={() => setSelectedSession(null)} />
            )}

            {selectedDiscipline && (
                <DisciplineModal discipline={selectedDiscipline} close={() => setSelectedDiscipline(null)} />
            )}
        </AuthenticatedLayout>
    )
}
