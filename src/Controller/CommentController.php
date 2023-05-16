<?php

namespace App\Controller;

use App\Repository\CommentRepository;
use App\Service\CommentService;
use Base\Request;
use Base\Response;
use Resource\CommentResource;

class CommentController
{
    private CommentService $commentService;
    private CommentRepository $commentRepository;

    public function __construct(CommentService $commentService, CommentRepository $commentRepository) {
        $this->commentService = $commentService;
        $this->commentRepository = $commentRepository;
    }

    public function createComment(Request $request, Response $response)
    {
        $comment = $this->commentService->create($request->post('comment'), $request->post('ticket_id'));

        $response->json(CommentResource::resource($comment), 201)->send();
    }

    public function commentList(Request $request, Response $response)
    {
        $comments = $this->commentRepository->findAll();

        $response->json(CommentResource::collection($comments))->send();
    }
}