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

    return (
        <AuthenticatedLayout user={user}>
            <div className=''>
                <Link href='/sessions/create' className='w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'>Record New Session</Link>
            </div>

            <SectionList data={user.gym_sessions} title='Past Sessions' keys={['date', 'discipline.discipline', 'start_time', 'end_time']} setSelectedItem={setSelectedSession} />

            <div className=''>
                <Link href='/recoveries/create' className='w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded'>Record New Recovery</Link>
            </div>

            <SectionList data={user.recoveries} title='Recovery' keys={['date', 'type', 'notes']} setSelectedItem={() => { }} />

            <div className='mt-4'>
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
