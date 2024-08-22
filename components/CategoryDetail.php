<?php namespace Voices4Budget\Contents\Components;

use AjaxException;
use Auth;
use Cms\Classes\ComponentBase;
use Flash;
use Lang;
use Voices4budget\Contents\Models\Category;
use Voices4budget\Contents\Models\Comment;
use Voices4budget\Contents\Models\Program;
use Voices4budget\Contents\Models\Vote;
use Voices4budget\Contents\Models\VotingSession;

/**
 * CategoryDetail Component
 *
 * @link https://docs.octobercms.com/3.x/extend/cms-components.html
 */
class CategoryDetail extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Category detail',
            'description' => 'Display detail of Category'
        ];
    }

    /**
     * @link https://docs.octobercms.com/3.x/element/inspector-types.html
     */
    public function defineProperties()
    {
        return [
            'categoryId' => [
                'title' => 'Category ID',
                'description' => 'The identifier of the category',
                'default' => '{{ :id }}',
                'type' => 'string',
            ]
        ];
    }

    public function category() {
        return Category::find($this->property('categoryId'));
    }

    public function votedCounts() {
        return Category::votedByCurrentUser()->count();
    }

    public function subcategoriesCount() {
        return Category::areSubPrograms()->count();
    }

    public function onRemoveComment() {
        $user = Auth::user();
        Comment::where('program_id', post('program_id'))
            ->where('user_id', $user->id)
            ->whereHas('voting_session', function($q) {
                $q->where('is_active', 1);
            })->delete();

        Flash::success('Komentar berhasil dihapus. Anda dapat menambahkan komentar baru');

        $this->page['program'] = Program::find(post('program_id'));
    }

    public function onPostcomment() {
        $user = Auth::user();

        $comment = Comment::firstOrNew([
            'user_id' => $user->id,
            'program_id' => post('program_id'),
            'voting_session_id' => VotingSession::where('is_active', 1)->first()->id
        ]);

        $comment->comment = post('comment');

        $comment->save();

        $this->page['comment'] = $comment;
    }

    public function onGetComment() {
        $user = Auth::user();
        $comment = Comment::where('program_id', post('program_id'))
            ->where('user_id', $user->id)
            ->whereHas('voting_session', function($q) {
                $q->where('is_active', 1);
            })->first();

        $this->page['program'] = Program::find(post('program_id'));
        $this->page['program_comment'] = $comment;
    }

    public function onSubmitVote() {
        $user = Auth::user();
        
        try {
            if (!post('program_ids')) {
                throw new AjaxException([
                    'success' => false,
                    'message' => __('vote.messages.validations.select_programs_first')
                ]);
            }

            foreach (post('program_ids') as $program_id) {
                $vote = Vote::firstOrNew([
                    'user_id' => $user->id,
                    'category_id' => post('category_id'),
                    'program_id' => $program_id,
                    'voting_session_id' => VotingSession::where('is_active', 1)->first()->id
                ]);

                if ($vote->id) {
                    throw new AjaxException([
                        'success' => false,
                        'message' => e(trans('voices4budget.contents::lang.general.internal_server_error'))
                    ]);
                }
    
                $vote->save();
            }
        } catch (\Throwable $th) {
            if ($th instanceof AjaxException) {
                throw $th;
            }

            throw new AjaxException([
                'success' => false,
                'message' => e(trans('voices4budget.contents::lang.general.internal_server_error'))
            ]);
        }

        return [
            'success' => true
        ];
    }
}
