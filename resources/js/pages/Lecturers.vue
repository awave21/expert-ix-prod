<script setup lang="ts">
import HeaderMenu from '@/components/mycomponents/HeaderMenu.vue';
import { Award, GraduationCap, Mail, Stethoscope } from 'lucide-vue-next';
import { computed } from 'vue';

const isDark = computed(() => false);

const theme = computed(() => ({
    text: isDark.value ? 'text-white' : 'text-neutral-900',
    textMuted: isDark.value ? 'text-neutral-400' : 'text-neutral-600',
    card: isDark.value ? 'bg-neutral-900' : 'bg-white',
    border: isDark.value ? 'border-neutral-800' : 'border-neutral-200',
}));
interface Lecturers {
    name: string;
    photo: string;
    position: string;
    specialization: string;
    description: string;
    achievements: string[];
    experience: string;
}
interface Props {
    lecturers: Lecturers[];
}
const props = defineProps<Props>();

/* const lecturers = [
    {
        name: 'Кулакова Регина Андреевна',
        position: 'Ведущий преподаватель, врач-гинеколог высшей категории',
        specialization: 'Эстетическая гинекология',
        experience: '15+ лет',
        photo: 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=400&h=400&fit=crop&crop=face',
        bio: 'Врач-гинеколог высшей категории с более чем 15-летним опытом работы. Специализируется на инъекционных методиках в эстетической гинекологии. Автор множества научных работ, постоянный участник профильных конференций.',
        achievements: [
            'Автор 25+ научных публикаций',
            'Сертифицированный тренер по эстетической гинекологии',
            'Член Российского общества акушеров-гинекологов',
        ],
    },
    {
        name: 'Коренная Вера Владимировна',
        position: 'Старший преподаватель, к.м.н.',
        specialization: 'Акушерство и гинекология',
        experience: '12+ лет',
        photo: 'https://images.unsplash.com/photo-1582750433449-648ed127bb54?w=400&h=400&fit=crop&crop=face',
        bio: 'Кандидат медицинских наук, специалист в области современной диагностики гинекологических заболеваний. Активно участвует в разработке образовательных программ для врачей.',
        achievements: ['Кандидат медицинских наук', 'Автор образовательных программ НМО', 'Эксперт по диагностике в гинекологии'],
    },
    {
        name: 'Бодня Ольга Сергеевна',
        position: 'Преподаватель, врач-гинеколог',
        specialization: 'Репродуктивная медицина',
        experience: '10+ лет',
        photo: 'https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?w=400&h=400&fit=crop&crop=face',
        bio: 'Врач-гинеколог с обширным опытом в области репродуктивной медицины. Специализируется на работе с осложнениями в эстетической медицине и их профилактике.',
        achievements: ['Сертифицированный специалист по ВРТ', 'Эксперт по осложнениям в эстетической медицине', 'Участник международных конференций'],
    },
    {
        name: 'Олейникова Анна',
        position: 'Преподаватель, врач-гинеколог',
        specialization: 'Гинекология',
        experience: '8+ лет',
        photo: 'https://images.unsplash.com/photo-1594824780348-1143a28b2121?w=400&h=400&fit=crop&crop=face',
        bio: 'Практикующий врач-гинеколог с фокусом на современных методах лечения. Активно участвует в образовательной деятельности и делится практическим опытом с коллегами.',
        achievements: ['Специалист по современным методам лечения', 'Автор методических рекомендаций', 'Наставник молодых специалистов'],
    },
]; */
</script>

<template>
    <HeaderMenu />
    <div class="min-h-screen bg-white">
        <!-- Page Header -->
        <section class="bg-gradient-to-br from-teal-50 via-white to-cyan-50 py-20">
            <div class="container mx-auto px-4">
                <div class="mx-auto max-w-4xl text-center">
                    <h1 :class="['mb-6 text-5xl font-bold', theme.text]">Наши лекторы</h1>
                    <p :class="['text-xl leading-relaxed', theme.textMuted]">
                        Ведущие специалисты и преподаватели медицинского образовательного центра с многолетним опытом и экспертизой
                    </p>
                </div>
            </div>
        </section>

        <div class="container mx-auto px-4 py-16">
            <!-- Lecturers Grid -->
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-2">
                <div
                    v-for="lecturer in lecturers"
                    :key="lecturer.name"
                    :class="['rounded-3xl border p-8 shadow-sm transition-all duration-200 hover:shadow-lg', theme.card, theme.border]"
                >
                    <!-- Header with Photo -->
                    <div class="mb-8 flex items-start space-x-6">
                        <img :src="lecturer.photo" :alt="lecturer.name" class="h-24 w-24 flex-shrink-0 rounded-3xl object-cover shadow-sm" />
                        <div class="flex-1">
                            <h3 :class="['mb-2 text-2xl font-bold', theme.text]">
                                {{ lecturer.name }}
                            </h3>
                            <p :class="['mb-2 text-lg font-medium text-teal-600']">
                                {{ lecturer.position }}
                            </p>
                            <div class="flex items-center space-x-4 text-sm text-neutral-500">
                                <div class="flex items-center space-x-1">
                                    <Stethoscope class="h-4 w-4" />
                                    <span>{{ lecturer.specialization }}</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <GraduationCap class="h-4 w-4" />
                                    <span>{{ lecturer.experience }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bio -->
                    <div class="mb-8">
                        <p :class="['text-base leading-relaxed', theme.textMuted]">
                            {{ lecturer.description }}
                        </p>
                    </div>

                    <!-- Achievements -->
                    <div class="mb-8">
                        <div class="mb-4 flex items-center space-x-2">
                            <Award class="h-5 w-5 text-amber-500" />
                            <h4 :class="['text-lg font-semibold', theme.text]">Достижения</h4>
                        </div>
                        <ul class="space-y-2">
                            <li v-for="achievement in lecturer.achievements" :key="achievement" class="flex items-start space-x-3">
                                <div class="mt-2 h-2 w-2 flex-shrink-0 rounded-full bg-teal-500"></div>
                                <span :class="['text-sm', theme.textMuted]">{{ achievement }}</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Contact Button -->
                    <button
                        class="flex w-full items-center justify-center space-x-2 rounded-full bg-gradient-to-r from-teal-600 to-cyan-600 px-6 py-3 font-semibold text-white transition-all duration-200 hover:shadow-lg"
                    >
                        <Mail class="h-4 w-4" />
                        <span>Связаться</span>
                    </button>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="mx-auto mt-20 max-w-4xl">
                <div :class="['rounded-3xl border p-12 text-center', theme.card, theme.border]">
                    <div class="mx-auto mb-6 flex h-16 w-16 items-center justify-center rounded-full bg-gradient-to-br from-teal-600 to-cyan-600">
                        <GraduationCap class="h-8 w-8 text-white" />
                    </div>
                    <h3 :class="['mb-6 text-3xl font-bold', theme.text]">Станьте частью нашей команды</h3>
                    <p :class="['mb-8 text-lg', theme.textMuted]">
                        Мы всегда ищем талантливых специалистов, готовых делиться знаниями и опытом с коллегами. Присоединяйтесь к нашей команде
                        преподавателей.
                    </p>
                    <div class="flex flex-col justify-center gap-4 sm:flex-row">
                        <button
                            class="transform rounded-full bg-gradient-to-r from-teal-600 to-cyan-600 px-8 py-4 font-semibold text-white transition-all duration-200 hover:scale-105 hover:shadow-lg"
                        >
                            Стать лектором
                        </button>
                        <button
                            :class="[
                                'rounded-full border-2 border-neutral-300 px-8 py-4 font-semibold transition-all duration-200 hover:border-teal-500',
                                theme.text,
                            ]"
                        >
                            Узнать больше
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
