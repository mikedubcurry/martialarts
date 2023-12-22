import { Link, useForm, usePage } from '@inertiajs/react';

export default function CreateSessionForm({ disciplines, gyms }) {
    const user = usePage().props.auth.user;
    const { data, setData, post, processing, errors, reset } = useForm({
        date: '',
        discipline_id: '',
        gym_id: '',
        start_time: '',
        end_time: '',
        notes: '',
    });

    const submit = (e) => {
        e.preventDefault();
        post('/sessions', {
            onSuccess: () => console.log('success'),
        });
    };
    return (
        <form onSubmit={submit} className='w-full max-w-lg' >
            <label>
                <span className=''>Date</span>
                <input className='' type='date' name='date' value={data.date} onChange={e => setData('date', e.target.value)} />
            </label>
            <label>
                <span className=''>Discipline</span>
                <select className='' name='discipline_id' value={data.discipline_id} onChange={e => setData('discipline_id', e.target.value)}>
                    <option value=''>Select a Discipline</option>
                    {disciplines.map((discipline) => (
                        <option key={discipline.id} value={discipline.id}>{discipline.discipline}</option>
                    ))}
                </select>
            </label>
            <label>
                <span className=''>Gym</span>
                <select className='' name='gym_id' value={data.gym_id} onChange={e => setData('gym_id', e.target.value)}>
                    <option value=''>Select a Gym</option>
                    {gyms.map((gym) => (
                        <option key={gym.id} value={gym.id}>{gym.name}</option>
                    ))}
                </select>
            </label>
            <label>
                <span className=''>Start Time</span>
                <input className='' type='time' name='start_time' value={data.start_time} onChange={e => setData('start_time', e.target.value)} />
            </label>
            <label>
                <span className=''>End Time</span>
                <input className='' type='time' name='end_time' value={data.end_time} onChange={e => setData('end_time', e.target.value)} />
            </label>
            <button className='' type='submit' disabled={processing}>Submit</button>
        </form>
    )
}
